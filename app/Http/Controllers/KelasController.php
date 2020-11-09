<?php

namespace App\Http\Controllers;

use App\Les;
use App\Murid;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function indexKelas(Request $request)
    {
        if(!$request->session()->has("IDLogin")){
            $request->session()->put("IDLogin","MRD0001");
        }
        $idMurid = $request->session()->get("IDLogin");
        $murid = Murid::find($idMurid)->get();

        $kelas = Les::all();

        return view("murid.components.DaftarLes",[
            "murid"=>$murid[0],
            "les"=>$kelas
        ]);
    }

    public function indexDetail(Request $request)
    {
        $idLes = $request->btnDetail;
        $request->session()->put("IDLesDetail",$idLes);
        $idMurid = $request->session()->get("IDLogin");

        $kelasDiambil = Murid::find($idMurid)->les;
        $kelas = Les::find($idLes)->get();

        return view("murid.components.DetailLes",[
            "les"=>$kelas[0],
            "lesDiambil" => $kelasDiambil
        ]);
    }
}
