<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlantPlayerLocations extends DataTransferObject
{
	public string $puuid;

	public float $viewRadians;

	public Location $location;
}
