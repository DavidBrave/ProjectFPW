<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Guru;
use App\Murid;
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
        $username = $request->username;
        $password = $request->password;
        if(sizeof(Murid::where("Murid_Username", $username)->get()) != 0){
            $user = Murid::where("Murid_Username", $username)->get();
            $request->session()->put("muridLogin", $user);
        }
        if(sizeof(Guru::where("Guru_Username", $username)->get()) != 0){
            $user = Guru::where("Guru_Username", $username)->get();
            $request->session()->put("guruLogin", $user);
        }
        if(sizeof(Admin::where("Admin_Username", $username)->get()) != 0){
            $user = Admin::where("Admin_Username", $username)->get();
            $request->session()->put("adminLogin", $user);
        }

        return redirect("/");
    }

    public function showRegister()
    {
        $data = Tingkat::select('*')->get();
        return view("register", ["tingkat"=>$data]);
    }

    public function registerPelajar(Request $request)
    {

    }

    public function registerPengajar(Request $request)
    {

    }
}
