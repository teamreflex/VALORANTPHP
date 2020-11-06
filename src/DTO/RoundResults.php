<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RoundResults extends DataTransferObject
{
	public int $roundNum;

	public string $roundResult;

	public string $roundCeremony;

	public string $winningTeam;

	public ?string $bombPlanter;

	public ?string $bombDefuser;

	public int $plantRoundTime;

	/** @var \Reflex\Valorant\DTO\PlantPlayerLocations[]|null $plantPlayerLocations */
	public ?array $plantPlayerLocations;

	public PlantLocation $plantLocation;

	public string $plantSite;

	public int $defuseRoundTime;

	/** @var \Reflex\Valorant\DTO\DefusePlayerLocations[]|null $defusePlayerLocations */
	public ?array $defusePlayerLocations;

	public DefuseLocation $defuseLocation;

	/** @var \Reflex\Valorant\DTO\PlayerStats[] $playerStats */
	public array $playerStats;

	public string $roundResultCode;
}
