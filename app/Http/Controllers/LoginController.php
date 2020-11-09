<?php

namespace App\Http\Controllers;

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
        return view("register");
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
