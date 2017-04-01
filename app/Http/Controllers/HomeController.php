<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('homes.index');
    }

    public function getListUser()
    {
        return view('site.home.listUser');
    }
    public function getdetailsUser($id)
    {
        $detailsUser = User::find($id);
        return view('site.home.details',compact('detailsUser'));
    }
}
