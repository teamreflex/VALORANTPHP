<?php

namespace Reflex\Valorant;

use JsonException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Reflex\Valorant\Exceptions\AuthorizationException;
use Reflex\Valorant\Exceptions\BadRequestException;
use Reflex\Valorant\Exceptions\NotFoundException;
use Reflex\Valorant\Exceptions\RateLimitException;
use Reflex\Valorant\Exceptions\ServerException;
use Reflex\Valorant\Exceptions\UnexpectedErrorException;
use Reflex\Valorant\Regions\AccountRegion;
use Reflex\Valorant\Regions\MatchRegion;

class ClientWrapper
{
    protected ClientInterface $client;
    protected string $key;
    protected AccountRegion $accountRegion;
    protected MatchRegion $matchRegion;

    /**
     * ClientWrapper constructor.
     * @param ClientInterface $client
     * @param string $key
     * @param AccountRegion $accountRegion
     * @param MatchRegion $matchRegion
     */
    public function __construct(ClientInterface $client, string $key, AccountRegion $accountRegion, MatchRegion $matchRegion)
    {
        $this->client = $client;
        $this->key = $key;
        $this->accountRegion = $accountRegion;
        $this->matchRegion = $matchRegion;
    }

    /**
     * Make a request to Riot via the HTTP client.
     * @param string $method
     * @param string $uri
     * @param array $content
     * @param bool $isAccount
     * @return array
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws JsonException
     * @throws NotFoundException
     * @throws RateLimitException
     * @throws ServerException
     * @throws UnexpectedErrorException
     */
    public function request(string $method, string $uri, array $content = [], bool $isAccount = false): array
    {
        $region = $isAccount ? $this->accountRegion->getValue() : $this->matchRegion->getValue();
        $base_uri = "https://{$region}.api.riotgames.com/{$uri}";

        $response = $this->client->request($method, $base_uri, [
            'query'         => [],
            'form_params'   => $content,
            'headers'       => ['X-Riot-Token' => $this->getKey()],
            'http_errors'   => false,
            'verify'        => false,
        ]);

        return $this->handleErrors($response);
    }

    /**
     * Handles the response and throws errors accordingly.
     * @param ResponseInterface $response
     * @return array
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws JsonException
     * @throws NotFoundException
     * @throws RateLimitException
     * @throws ServerException
     * @throws UnexpectedErrorException
     */
    protected function handleErrors(ResponseInterface $response): array
    {
        $code = $response->getStatusCode();
        switch ($code) {
            case 200:
                return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
                break;
            case 400:
                throw new BadRequestException('Request format was incorrect or malformed.');
                break;
            case 401:
                throw new AuthorizationException('Unauthorized (Invalid API key or insufficient permissions)');
                break;
            case 404:
                throw new NotFoundException('Data not found.');
                break;
            case 429:
                throw new RateLimitException('Rate limit exceeded.');
                break;
            case 500:
            case 502:
            case 503:
            case 504:
                throw new ServerException("Something went wrong on Riot's end. ({$code})");
                break;
            default:
                throw new UnexpectedErrorException($response->getBody());
                break;
        }
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return AccountRegion
     */
    public function getAccountRegion(): AccountRegion
    {
        return $this->accountRegion;
    }

    /**
     * @param AccountRegion $accountRegion
     */
    public function setAccountRegion(AccountRegion $accountRegion): void
    {
        $this->accountRegion = $accountRegion;
    }

    /**
     * @return MatchRegion
     */
    public function getMatchRegion(): MatchRegion
    {
        return $this->matchRegion;
    }

    /**
     * @param MatchRegion $matchRegion
     */
    public function setMatchRegion(MatchRegion $matchRegion): void
    {
        $this->matchRegion = $matchRegion;
    }

    /**
     * Get the underlying client.
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }
}
