<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function IndexHomeMurid(Request $request)
    {
        if(!$request->session()->has("IDLogin")){
            $request->session()->put("IDLogin","MRD0001");
        }
        $idMurid = $request->session()->get("IDLogin");
        $murid = Murid::find($idMurid)->get();

        return view("murid.components.HomeMurid",[
            "username"=>$murid[0]->Murid_Username
        ]);
    }
}
