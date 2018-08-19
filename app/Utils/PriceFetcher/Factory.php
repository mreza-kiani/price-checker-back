<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 4/15/18
 * Time: 6:10 PM
 */

namespace App\Utils\PriceFetcher;


class Factory
{
    private static $singleton = [];

    /**
     * @param string $driverName
     */
    private static function updateInstance($driverName = null)
    {
        if (static::$singleton == null or !key_exists($driverName, static::$singleton)) {
            if (key_exists($driverName, Kernel::$drivers)) {
                static::$singleton[$driverName] = new Kernel::$drivers[$driverName]();
            } else {
                static::$singleton[$driverName] = null;
            }
        }
    }

    /**
     * @param string $driverName
     * @return BaseDriver
     */
    public static function driver($driverName = null)
    {
        $driverName = $driverName == null ? env("FETCHER_DEFAULT_DRIVER", 'json-ld') : $driverName;
        static::updateInstance($driverName);
        return static::$singleton[$driverName];
    }
}