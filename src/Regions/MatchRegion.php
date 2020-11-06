<?php

namespace Reflex\Valorant\Regions;

use MyCLabs\Enum\Enum;

/**
 * @method static MatchRegion OCEANIA()
 * @method static MatchRegion PACIFIC()
 * @method static MatchRegion BRAZIL()
 * @method static MatchRegion EUROPE()
 * @method static MatchRegion KOREA()
 * @method static MatchRegion LATAM()
 * @method static MatchRegion AMERICA()
 */
class MatchRegion extends Enum
{
    private const OCEANIA = 'ap';
    private const PACIFIC = 'ap';
    private const BRAZIL = 'br';
    private const EUROPE = 'eu';
    private const KOREA = 'kr';
    private const LATAM = 'latam';
    private const AMERICA = 'na';
}