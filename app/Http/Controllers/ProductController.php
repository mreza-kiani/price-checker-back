<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Utils\ResponseGenerator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(Request $request) {
    	$product = Product::create([
    		"name" => "",
			"url" => $request->get('url'),
			"price" => 0,
			"unit" => "USD",
			"driver" => 0,
		]);
    	return response()->json(ResponseGenerator::make($product, 'product.add_success'));
	}
}
