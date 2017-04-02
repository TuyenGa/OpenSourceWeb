<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CURLController extends Controller
{
     public  function ListUser()
     {
         $client = new Client([
             'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
             'timeout'=> 7.0,
             'headers' => ['user-Agent' =>'ListUser']
         ]);


         $response = $client->request('GET','user?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC80NS41NS43Ny4xODI6ODg4OFwvYXBpXC92Mi4wXC9sb2dpbiIsImlhdCI6MTQ5MTA2MjY4NSwiZXhwIjoxNDkyMjcyMjg1LCJuYmYiOjE0OTEwNjI2ODUsInN1YiI6MzAsImp0aSI6ImZkZGRlNDIwYjJiNTAyNzA2N2NhYTA1ZGI1MGY0YzZlIn0.OY2P0wIiNo_KeJjyOAR514Xf_YmGjsotprLvCGZkmEI');


             $body = $response->getBody();
             $content =  $body->getContents();


            $listUser = \GuzzleHttp\json_decode($content,false,512,JSON_BIGINT_AS_STRING)->data->users->data;

//            echo "<pre>";
//                print_r($token);
//            echo "</pre>";
            return view('homes.listUser',compact('listUser'));

     }

     public function checkToken()
     {
         $client = new Client([
             'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
             'timeout'=> 7.0,
             'headers' => ['user-Agent' =>'ListUser']
         ]);

         $getToken = $client->request('GET','check');
         $tokenBody=  $getToken->getBody();
         $contentToken = $tokenBody->getContents();
         $token = \GuzzleHttp\json_decode($contentToken,false,512,JSON_BIGINT_AS_STRING)->data;
     }


}
