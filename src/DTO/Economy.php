<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Economy extends DataTransferObject
{
	public int $loadoutValue;

	public string $weapon;

	public string $armor;

	public int $remaining;

	public int $spent;
}
