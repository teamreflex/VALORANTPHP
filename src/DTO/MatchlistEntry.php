<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchlistEntry extends DataTransferObject
{
    public string $matchId;
    public int $gameStartTime;
    public string $teamId;
}
