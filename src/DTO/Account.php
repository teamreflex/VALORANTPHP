<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Account extends DataTransferObject
{
    public string $puuid;
    public string $gameName;
    public string $tagLine;

    /**
     * Concatenate the two for the full ID.
     *
     * @return string
     */
    public function getRiotId(): string
    {
        return "{$this->gameName}#{$this->tagLine}";
    }
}
