<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CURLController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function checkToken(Request $request)
    {
        $client = new Client([
            'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
            'timeout' => 20
        ]);

        $response = $client->request('GET', 'check');

        $body = $response->getBody();

        $content = $body->getContents();

        $token = \GuzzleHttp\json_decode($content,false,512, JSON_BIGINT_AS_STRING)->Data;

        $request->session()->put('check' , $token);

        echo "<pre>";
        print_r($token);
        echo "</pre>";

    }


}
