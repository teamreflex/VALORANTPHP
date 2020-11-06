<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class AbilityCasts extends DataTransferObject
{
	public int $grenadeCasts;

	public int $ability1Casts;

	public int $ability2Casts;

	public int $ultimateCasts;
}
