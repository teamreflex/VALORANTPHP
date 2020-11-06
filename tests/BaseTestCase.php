<?php

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use PHPUnit\Framework\TestCase;
use Reflex\Valorant\Regions\AccountRegion;
use Reflex\Valorant\Regions\MatchRegion;
use Reflex\Valorant\Valorant;

class BaseTestCase extends TestCase
{
    protected Valorant $valorant;
    protected MockHandler $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();

        // mocking
        $http = new Client([
            'handler' => $this->mockHandler,
        ]);
        // real
        //$http = new Client();

        $this->valorant = new Valorant($http, '', AccountRegion::AMERICAS(), MatchRegion::AMERICA());

        parent::setUp();
    }

}
