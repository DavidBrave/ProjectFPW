<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;

class KelasMuridController extends Controller
{
    public function indexMuridKelas(Request $request)
    {
        $idMurid = $request->session()->get("IDLogin");

        $kelasDiambil = Murid::find($idMurid)->les;
        return view("murid.components.LesYgDiambil",[
            "leslesan"=>$kelasDiambil
        ]);
    }
}
