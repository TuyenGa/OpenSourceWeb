<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('site.login');
    }
    public function postLogin(Request $request)
    {
        $client = new Client([
            'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
            'timeout'=> 100
        ]);


        $data = [
            'email' => $request->get('email'),
            'password' =>$request->get('password')
        ];
        $response = $client->request('POST','login?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC80NS41NS43Ny4xODI6ODg4OFwvYXBpXC92Mi4wXC9sb2dpbiIsImlhdCI6MTQ5MTA2MjY4NSwiZXhwIjoxNDkyMjcyMjg1LCJuYmYiOjE0OTEwNjI2ODUsInN1YiI6MzAsImp0aSI6ImZkZGRlNDIwYjJiNTAyNzA2N2NhYTA1ZGI1MGY0YzZlIn0.OY2P0wIiNo_KeJjyOAR514Xf_YmGjsotprLvCGZkmEI',[
            'form_params' => $data

        ]);
        $body = $response->getBody();
        $login = $body->getContents();

        $message = \GuzzleHttp\json_decode($login , false,512,JSON_BIGINT_AS_STRING)->status;
        $err  = \GuzzleHttp\json_decode($login , false,512,JSON_BIGINT_AS_STRING)->message['0'];

        if ($message == 'success')
        {
//            echo "<pre>";
//            print_r($message)
            return redirect()->route('homes.index');

        }
        else
        {
           return view('site.login',compact('err'));
        }




    }
    public function getRegister()
    {
        return view('site.register');
    }
    public function postRegister(Request $request)
    {

        $client = new Client([
           'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
            'timeout' => 100
        ]);
        $data = [
          'first_name'=>$request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password'=>$request->get('password'),
            'repassword' =>$request->get('repassword'),
            'sex'=> $request->get('sex'),
            'phone' => $request->get('phone'),
            'birthday' => $request->get('birthday'),
            'description'=> $request->get('description'),
            'address'=>$request->get('address'),
            'company'=>$request->get('company'),
            'relationships' => $request->get('relationships'),
            'phone_parent'=> $request->get('phone_parent')
        ];
        $response = $client->request('POST','register?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ0b2tlbl9jaGVja190aW1lX291dCIsImlhdCI6MTQ5MTA2Mjk4MSwiZXhwIjoxNDkxMDYzMjgxLCJuYmYiOjE0OTEwNjI5ODEsInN1YiI6MSwianRpIjoiOGNmOWIxNjAwMDY4YWZkZjNhNmYxZDgxMjFhMzUxOTQifQ.eXKwcT8Y4cxSDz7kt6m0y63cYTYw_DJDv8VMrxVtgEk',[
            'form_params' =>$data
        ]);

        $body = $response->getBody();
        $register = $body->getContents();

        $message = \GuzzleHttp\json_decode($register,false,512,JSON_BIGINT_AS_STRING);
        echo "<pre>";
            print_r($message);
        echo "</pre>";
       // return redirect('home.index');
    }
}
