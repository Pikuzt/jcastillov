<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
// use GuzzleHttp\Psr7\Request;

class WebService extends Controller
{


    public function mostrarApi()
    {
        $api = config('app.BASE_URI');
        $token = config('app.TOKEN');
        $client = new \GuzzleHttp\Client();
        $wsHeaders = [
            // 'Authorization' => 'Bearer ' . config('app.TOKEN'),
            "Accept" => "application/json",
            'Content-Type' => 'application/json',
            "Bmx-Token"=> $token
        ];
        $fechaActual = date('Y-m-d');
        // dd($fechaActual);
        // 2023-07-16/2023-07-16
        $request = new Request('GET',$api.'series/SF60653/datos/'.$fechaActual.'/'.$fechaActual, $wsHeaders);
        $response = $client->sendAsync($request)->wait();
        $jsonResponse = json_decode($response->getBody()->getContents());
        return $jsonResponse;
    }
}
