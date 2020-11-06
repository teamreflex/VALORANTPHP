<?php

namespace Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Reflex\Valorant\Regions\AccountRegion;
use Reflex\Valorant\Regions\MatchRegion;
use Reflex\Valorant\Valorant;

class ClientTest extends TestCase
{
    /**
     * Test if the underlying client is wrapping correctly.
     */
    public function test_client_wrapping(): void
    {
        $guzzle = new Client();
        $valorant = new Valorant($guzzle, 'asdf', AccountRegion::AMERICAS(), MatchRegion::AMERICA());

        $this->assertEquals($guzzle, $valorant->getClient()->getClient());
    }
}
