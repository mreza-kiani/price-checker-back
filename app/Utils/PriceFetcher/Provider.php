<?php
/**
 * Created by PhpStorm.
 * User: mamareza
 * Date: 8/29/2018 AD
 * Time: 22:38
 */

namespace App\Utils\PriceFetcher;


use App\Models\Product;
use Illuminate\Support\Facades\Log;

class Provider
{
    public static function setDriver(Product $product) {
        foreach (Kernel::$drivers as $driverNumber => $driverClass) {
            $result = Factory::driver($driverNumber)->update($product);
            if ($result == true) {
                $product->update(['driver' => $driverNumber]);
                return true;
            }
        }
        // TODO: alert developer we couldn't support this product, maybe a new driver should be developed
        Log::error("Driver not found for product {$product->id}");
        return false;
    }

    public static function update(Product $product) {
        return Factory::driver($product->driver)->update($product);
    }
}