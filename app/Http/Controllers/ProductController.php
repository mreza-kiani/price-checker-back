<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Utils\PriceFetcher\Provider;
use App\Utils\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
		Auth::user()->products()->attach($product->id);
		Provider::setDriver($product);
    	return response()->json(ResponseGenerator::make($product, 'product.add_success'));
	}

	public function getlist(){
		$products = Auth::user()->products()->get();
		return response()->json(ResponseGenerator::make($products));
		
	}

	public function delete(Request $request){
		$productId = $request ->get('id');
		$user = Auth::user();
		$user->products()->detach($productId);
        return response()->json(ResponseGenerator::make([],'product.delete_success'));
	}
}