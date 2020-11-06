<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Ability extends DataTransferObject
{
	public $grenadeEffects;

	public $ability1Effects;

	public $ability2Effects;

	public $ultimateEffects;
}
