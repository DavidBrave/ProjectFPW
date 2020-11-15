<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function profile(Request $request)
    {
        $guru =  $request->session()->get("guruLogin");
        return view("guru_profile", ["guru" => $guru[0]]);
    }
}
