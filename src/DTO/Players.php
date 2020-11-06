<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Players extends DataTransferObject
{
	public string $puuid;

	public string $teamId;

	public string $partyId;

	public string $characterId;

	public Stats $stats;

	public int $competitiveTier;

	public string $playerCard;

	public string $playerTitle;
}
