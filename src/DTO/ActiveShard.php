<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ActiveShard extends DataTransferObject
{
    public string $puuid;
    public string $game;
    public string $activeShard;
}
