<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 4/24/18
 * Time: 5:33 PM
 */

namespace App\Utils\PriceFetcher;

class Kernel
{
    public static $sessionKey = "price-fetcher";

    public static $drivers = [
        'json-ld' => \App\Utils\PriceFetcher\Drivers\JsonLd\Driver::class,
    ];
}