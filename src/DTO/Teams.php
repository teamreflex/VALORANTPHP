<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Teams extends DataTransferObject
{
	public string $teamId;

	public bool $won;

	public int $roundsPlayed;

	public int $roundsWon;
}
