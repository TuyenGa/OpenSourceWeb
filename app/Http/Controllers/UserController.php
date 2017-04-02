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
        $response = $client->request('POST','login?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ0b2tlbl9jaGVja190aW1lX291dCIsImlhdCI6MTQ5MTEwMDY3NiwiZXhwIjoxNDkxMTAwOTc2LCJuYmYiOjE0OTExMDA2NzYsInN1YiI6MSwianRpIjoiZDBmMWNhYTRjOTFhYjY3NDFkMGRmMDM0MDNmNDQyNzcifQ.qu8AsaNG9JL2ge7UL9gkBUCrslB_y_UiiwWk-qUH7xg',[
            'form_params' => $data

        ]);
        $body = $response->getBody();
        $login = $body->getContents();

        $message = \GuzzleHttp\json_decode($login , false,512,JSON_BIGINT_AS_STRING)->status;
        $token  = \GuzzleHttp\json_decode($login , false,512,JSON_BIGINT_AS_STRING)->data;
        $request->session()->put('users',$token);

        if ($message == 'success')
        {
            echo "<pre>";
            print_r($token);
            echo '<br>';
            echo $request->session()->get('users');
            echo "<pre>";
//            return redirect()->route('homes.index');

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
        $response = $client->request('POST','register?token='.$request->session()->get('users'),[
            'form_params' =>$data
        ]);

        $body = $response->getBody();
        $register = $body->getContents();

        $message = \GuzzleHttp\json_decode($register,false,512,JSON_BIGINT_AS_STRING);
        echo "<pre>";
            print_r($message);
        echo "</pre>";
//        return redirect('home.index');
    }
    public function ListUser(Request $request)
    {
        $client = new Client([
           'base_uri' => 'http://45.55.77.182:8888/api/v2.0/',
            'timeout' => 20
        ]);

        $response = $client->request('GET' , 'user?token='.$request->session()->get('users'));

        $body = $response->getBody();

        $content = $body->getContents();

        $listUser = \GuzzleHttp\json_decode($content, false, 512, JSON_BIGINT_AS_STRING)->data->users->data;

        return view('homes.listUser',compact('listUser'));

    }
}
