<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchInfo extends DataTransferObject
{
	public string $matchId;

	public string $mapId;

	public int $gameLengthMillis;

	public int $gameStartMillis;

	public string $provisioningFlowId;

	public bool $isCompleted;

	public string $customGameName;

	public string $queueId;

	public string $gameMode;

	public bool $isRanked;

	public string $seasonId;
}
