<?php

namespace Tests;

use GuzzleHttp\Psr7\Response;

class AccountTest extends BaseTestCase
{
    public function test_account_fetch_by_riot(): void
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/stubs/account_fetch.json')));

        $response = $this->valorant->fetchAccountByRiot('Kairu#1481');

        $this->assertEquals('1481', $response->tagLine);
    }

    public function test_account_fetch_by_puuid(): void
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/stubs/account_fetch.json')));

        $response = $this->valorant->fetchAccountByPuuid('...');

        $this->assertEquals('1481', $response->tagLine);
    }

    public function test_account_fetch_shard(): void
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/stubs/activeshard.json')));

        $response = $this->valorant->fetchShard('...');

        $this->assertEquals('ap', $response->activeShard);
    }
}
