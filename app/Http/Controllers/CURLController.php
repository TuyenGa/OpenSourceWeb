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


         $response = $client->request('GET','user?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92Mi4wXC9sb2dpbiIsImlhdCI6MTQ5MDQ0MzA3MiwiZXhwIjoxNDkxNjUyNjcyLCJuYmYiOjE0OTA0NDMwNzIsInN1YiI6MSwianRpIjoiNWM1MTkxYjkxY2NjYTE3YWNjMDExNGY1OGFhOWM2MTEifQ.voSmg-C4Nu1LjqGbsb5DQTEpLmn1DVEpsZ_qXMFHmi8');


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
