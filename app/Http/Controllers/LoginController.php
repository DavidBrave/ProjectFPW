<?php

namespace App\Http\Controllers;

use App\Tingkat;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function ShowLogin()
    {
        return view("login");
    }

    public function Login(Request $request)
    {

    }

    public function showRegister()
    {
        $data = Tingkat::select('*')->get();
        return view("register", ["tingkat"=>$data]);
    }

    public function registerPelajar(Request $request)
    {
        # code...
    }

    public function registerPengajar(Request $request)
    {
        # code...
    }
}
