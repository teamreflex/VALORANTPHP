<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Stats extends DataTransferObject
{
	public int $score;

	public int $roundsPlayed;

	public int $kills;

	public int $deaths;

	public int $assists;

	public int $playtimeMillis;

	public AbilityCasts $abilityCasts;
}
