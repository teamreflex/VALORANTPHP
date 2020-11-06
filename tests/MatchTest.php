<?php

namespace Tests;

use GuzzleHttp\Psr7\Response;

class MatchTest extends BaseTestCase
{
    public function test_matchlist_fetch(): void
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/stubs/matchlist.json')));

        $response = $this->valorant->fetchMatchlist('...');

        $this->assertCount(6, $response);
    }

    public function test_match_fetch(): void
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/stubs/match.json')));

        $response = $this->valorant->fetchMatch('...');

        $this->assertEquals('/Game/Maps/Bonsai/Bonsai', $response->matchInfo->mapId);
    }
}
