<?php
/**
 * Created by PhpStorm.
 * User: mamareza
 * Date: 7/19/2018 AD
 * Time: 18:51
 */

namespace App\Utils;


class ResponseGenerator
{
    public static function make($data = [], $message = null) {
        if (isset($message))
            return [
                'data' => $data,
                'message' => trans($message),
            ];
        return [
            'data' => $data,
        ];
    }
}