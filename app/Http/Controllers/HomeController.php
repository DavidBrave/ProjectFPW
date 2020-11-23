<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function IndexHomeMurid(Request $request)
    {
        // $idMurid = $request->session()->get("IDLogin");
        // $murid = Murid::where("Murid_Id",$idMurid)->get();
        $murid = $request->session()->get("muridLogin");

        return view("murid.components.HomeMurid",[
            // "username"=>$murid[0]->Murid_Username
            "username"=>$murid->Murid_Username
        ]);
    }
}
