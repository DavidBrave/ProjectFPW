<?php

namespace App\Http\Controllers;

use App\Les;
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
        $kelas = Les::all();
        return view("courses", ["les" => $kelas]);
    }

    public function detailCourse(Request $request)
    {
        $les = Les::find($request->id);
        return view("detail", ["les" => $les]);
    }
}
