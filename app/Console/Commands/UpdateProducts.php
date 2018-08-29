<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Utils\PriceFetcher\Provider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command update product prices from source';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Product::all() as $product) {
            if (Provider::update($product))
                Log::info("Product {$product->id} successfully updated!");
            else
                // TODO: alert developer there was a problem in updating product
                Log::error("Could not update product {$product->id}");
        }
    }
}
