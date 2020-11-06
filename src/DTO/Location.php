<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Location extends DataTransferObject
{
	public int $x;

	public int $y;
}
