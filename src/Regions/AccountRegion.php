<?php

namespace Reflex\Valorant\Regions;

use MyCLabs\Enum\Enum;

/**
 * @method static AccountRegion AMERICAS()
 * @method static AccountRegion EUROPE()
 * @method static AccountRegion ASIA()
 */
class AccountRegion extends Enum
{
    private const AMERICAS = 'americas';
    private const EUROPE = 'europe';
    private const ASIA = 'asia';
}