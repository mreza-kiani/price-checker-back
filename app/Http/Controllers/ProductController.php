<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
		$user->products()->attach($product->id);
    	return response()->json(ResponseGenerator::make($product, 'product.add_success'));
	}
	public function getlist(){
		$list = Auth::user() -> products();
		return response()->json(ResponseGenerator::make($list,'success'));
		
	}
	public function delete(Request $request){
		$productid = $request ->get('id');
		$user = Auth::user();
		$user->products()->detach($productid);

	}
}
// -=