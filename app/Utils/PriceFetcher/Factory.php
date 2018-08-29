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
     * @param int $driverNumber
     */
    private static function updateInstance($driverNumber = null)
    {
        if (static::$singleton == null or !key_exists($driverNumber, static::$singleton)) {
            if (key_exists($driverNumber, Kernel::$drivers)) {
                static::$singleton[$driverNumber] = new Kernel::$drivers[$driverNumber]();
            } else {
                static::$singleton[$driverNumber] = null;
            }
        }
    }

    /**
     * @param int $driverNumber
     * @return BaseDriver
     */
    public static function driver($driverNumber)
    {
        static::updateInstance($driverNumber);
        return static::$singleton[$driverNumber];
    }
}