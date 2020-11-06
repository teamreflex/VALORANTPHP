<?php

namespace Reflex\Valorant\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Match extends DataTransferObject
{
	public MatchInfo $matchInfo;

	/** @var \Reflex\Valorant\DTO\Players[] $players */
	public array $players;

	/** @var \Reflex\Valorant\DTO\Teams[] $teams */
	public array $teams;

	/** @var \Reflex\Valorant\DTO\RoundResults[] $roundResults */
	public array $roundResults;
}
