<?php

namespace App\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class DptUtils
{


    public static function find(string $nik)
    {

        $client = new Client();

        $headers = [
            'Origin' => 'https://cekdptonline.kpu.go.id',
            'Referer' => 'https://cekdptonline.kpu.go.id/',
            'Content-Type' => 'application/json',
        ];

        $body = str_replace(':nik', $nik, Constant::$dptBody);


        $request = new Request('POST', 'https://cekdptonline.kpu.go.id/apilhp', $headers,
            json_encode([
                "query" => $body
            ])
        );
        $res = $client->sendAsync($request)->wait();
        $data = json_decode($res->getBody());

        return $data->data->findNikSidalih;

    }

}
