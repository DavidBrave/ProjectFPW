<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view("home");
    }

    public function about()
    {
        return view("about");
    }

    public function darkmode(Request $request)
    {
        $dark = $request->input("dark");
        $request->session()->put("dark", $dark);
    }

    public function courses()
    {
        return view("courses");
    }
}
