<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 4/24/18
 * Time: 6:46 PM
 */

namespace App\Utils\PriceFetcher\Drivers\JsonLd;


use App\Utils\PriceFetcher\BaseDriver;


class Driver extends BaseDriver {

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return mixed
     */
    public function getProductInfo($response)
    {
        $body = $response->getBody();

        $pattern = "/<script(.*)type=[\"\']application\/ld\+json[\"\'](.*)>([^<]*)<\/script>/";
        preg_match_all($pattern, $body, $outputArray);

        foreach ($outputArray[3] as $result) {
            $line = str_replace("\n", "", $result);
            $info = [];

            $type = $this->getPregMatchValue("@type", $line);
            if ($type != "Product")
                continue;

            $info["name"] = $this->getPregMatchValue("name", $line);
            $info["price"] = $this->getPregMatchValue("price", $line); //TODO: fix price regex
            $info["unit"] = $this->getPregMatchValue("priceCurrency", $line);
            $info["image_url"] = $this->getPregMatchValue("image", $line);

            return $info;
        }

        return false;
    }

    private function getPregMatchValue($type, $line) {
        $pattern = "/\"{$type}\"([^:]*):([^(\")]*)\"([^\"]*)\"/";
        preg_match($pattern, $line, $outputArray);
        return $outputArray[3];
    }
}