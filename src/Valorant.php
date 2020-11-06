<?php

namespace Reflex\Valorant;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientInterface;
use Reflex\Valorant\DTO\Account;
use Reflex\Valorant\DTO\ActiveShard;
use Reflex\Valorant\DTO\Match;
use Reflex\Valorant\DTO\MatchlistEntry;
use Reflex\Valorant\Regions\AccountRegion;
use Reflex\Valorant\Regions\MatchRegion;

class Valorant
{
    /**
     * PSR-18 compatible HTTP client wrapped in our wrapper.
     * @var ClientWrapper
     */
    protected ClientWrapper $client;

    /**
     * Valorant constructor.
     * @param ClientInterface $client
     * @param string $key
     * @param AccountRegion $accountRegion
     * @param MatchRegion $matchRegion
     */
    public function __construct(ClientInterface $client, string $key, AccountRegion $accountRegion, MatchRegion $matchRegion)
    {
        $this->client = new ClientWrapper($client, $key, $accountRegion, $matchRegion);
    }

    /**
     * @return ClientWrapper
     */
    public function getClient(): ClientWrapper
    {
        return $this->client;
    }

    /**
     * Fetch an account from Riot via puuid.
     * @param string $puuid
     * @return Account
     * @throws Exceptions\AuthorizationException
     * @throws Exceptions\BadRequestException
     * @throws Exceptions\NotFoundException
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\ServerException
     * @throws Exceptions\UnexpectedErrorException
     * @throws \JsonException
     */
    public function fetchAccountByPuuid(string $puuid): Account
    {
        $response  = $this->client->request('get', "/riot/account/v1/accounts/by-puuid/{$puuid}", [], true);

        return new Account($response);
    }

    /**
     * Fetch an account from Riot via Riot ID.
     * @param string $riotId
     * @return Account
     * @throws Exceptions\AuthorizationException
     * @throws Exceptions\BadRequestException
     * @throws Exceptions\NotFoundException
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\ServerException
     * @throws Exceptions\UnexpectedErrorException
     * @throws \JsonException
     */
    public function fetchAccountByRiot(string $riotId): Account
    {
        $splitId = explode('#', $riotId);
        $response  = $this->client->request('get', "/riot/account/v1/accounts/by-riot-id/{$splitId[0]}/{$splitId[1]}", [], true);

        return new Account($response);
    }

    /**
     * Fetch the VALORANT shard for a user's account.
     * @param string $puuid
     * @return ActiveShard
     * @throws Exceptions\AuthorizationException
     * @throws Exceptions\BadRequestException
     * @throws Exceptions\NotFoundException
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\ServerException
     * @throws Exceptions\UnexpectedErrorException
     * @throws \JsonException
     */
    public function fetchShard(string $puuid): ActiveShard
    {
        $response  = $this->client->request('get', "/riot/account/v1/active-shards/by-game/val/by-puuid/{$puuid}", [], true);

        return new ActiveShard($response);
    }

    /**
     * Fetch a matchlist by puuid.
     * @param string $puuid
     * @return Collection
     * @throws Exceptions\AuthorizationException
     * @throws Exceptions\BadRequestException
     * @throws Exceptions\NotFoundException
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\ServerException
     * @throws Exceptions\UnexpectedErrorException
     * @throws \JsonException
     */
    public function fetchMatchlist(string $puuid): Collection
    {
        $response  = $this->client->request('get', "/riot/match/v1/matchlists/by-puuid/{$puuid}");

        return Collection::make($response['history'])
            ->map(fn (array $data) => new MatchlistEntry($data));
    }

    /**
     * Fetch a matchlist by puuid.
     * @param string $matchId
     * @return Match
     * @throws Exceptions\AuthorizationException
     * @throws Exceptions\BadRequestException
     * @throws Exceptions\NotFoundException
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\ServerException
     * @throws Exceptions\UnexpectedErrorException
     * @throws \JsonException
     */
    public function fetchMatch(string $matchId): Match
    {
        $response  = $this->client->request('get', "/riot/match/v1/matches/{$matchId}");

        return new Match($response);
    }
}
