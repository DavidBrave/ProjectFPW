<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function IndexHomeMurid(Request $request)
    {
        $idMurid = $request->session()->get("IDLogin");
        $murid = Murid::where("Murid_Id",$idMurid)->get();

        return view("murid.components.HomeMurid",[
            "username"=>$murid[0]->Murid_Username
        ]);
    }
}
