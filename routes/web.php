<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // driver json-ld test

    $product = \App\Models\Product::find(1);
    if (!$product) {
        $product = \App\Models\Product::create([
            "name" => "",
            "price" => 0,
            "unit" => "USD",
            "driver" => 0,
            'url' => "https://www.digikala.com/product/dkp-529654/%DA%A9%DB%8C%D9%81-%D8%B1%D9%88%D8%AF%D9%88%D8%B4%DB%8C-%DA%86%D8%B1%D9%85-%D8%B7%D8%A8%DB%8C%D8%B9%DB%8C-%D8%A8%D8%B1%D9%86%D8%AF%D8%B2%DA%A9%D8%A7%D9%84%D8%A7-%D9%85%D8%AF%D9%84-bk-612"
        ]);
    }

    \App\Utils\PriceFetcher\Factory::driver('json-ld')->update($product);
});
