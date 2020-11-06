# VALORANTPHP

![Test](https://github.com/teamreflex/VALORANTPHP/workflows/Test/badge.svg?branch=master)
[![Latest Version](https://img.shields.io/packagist/v/team-reflex/valorant-php.svg)](https://packagist.org/packages/team-reflex/valorant-php)
[![Downloads](https://img.shields.io/packagist/dt/team-reflex/valorant-php.svg)](https://packagist.org/packages/team-reflex/valorant-php)

PSR-18 compliant package for the VALORANT API by Riot.

## Note
The match endpoints have been written blind, as I don't have access to the VALORANT API yet.

The only resource I've been able to use is some [sample JSON](https://gist.github.com/RiotTuxedo/34e1af353d9d340619cbbfa4579fc81c) from [Riot Tuxedo](https://github.com/RiotTuxedo) in the Riot Dev Discord server.

Every DTO from the Match resource has been generated based on this JSON, so it may not be accurate, nor have every type set correctly.

## Installation
Requires PHP 7.4 as it takes advantage of its type support.

Install via composer:

```bash
composer require team-reflex/valorant-php
```

## Usage
As the package is PSR-18 compliant, it does not come with an HTTP client by default.

You can use a client such as Guzzle, and pass an instance of it when instantiating:

```php
$http = new GuzzleHttp\Client();
$valorant = new Valorant($http, 'api_key_here', AccountRegion::AMERICAS(), MatchRegion::AMERICA());
```

Now you're ready to make requests:

```php
$player = $valorant->fetchAccountByRiot('Kairu#1481');
```

## Contact
- [@Reflexgg](http://twitter.com/Reflexgg)
- [@Kairuxo](http://twitter.com/Kairuxo)
