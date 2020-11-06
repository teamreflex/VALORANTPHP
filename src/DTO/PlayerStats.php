<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlayerStats extends DataTransferObject
{
	public string $puuid;

	public $kills;

	public $damage;

	public int $score;

	public Economy $economy;

	public Ability $ability;
}
