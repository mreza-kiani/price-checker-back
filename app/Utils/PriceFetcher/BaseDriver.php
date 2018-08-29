<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 4/24/18
 * Time: 6:46 PM
 */

namespace App\Utils\PriceFetcher;

use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

abstract class BaseDriver
{
    public function update(Product $product) {
        try {
            $response = $this->fetchHTML($product->url);
            if ($response->getStatusCode() != 200)
                return false;

            $data = $this->getProductInfo($response);
            if ($data)
                return $product->update($data);
        } catch (GuzzleException $e) {
            Log::error($e->getMessage());
        }
        return false;
    }

    /**
     * @param string $url
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function fetchHTML($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        return $response;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return mixed
     */
    abstract public function getProductInfo($response);
}