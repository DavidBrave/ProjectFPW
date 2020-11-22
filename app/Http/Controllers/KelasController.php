<?php

namespace App\Http\Controllers;

use App\Les;
use App\Murid;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function indexKelas(Request $request)
    {
        // $idMurid = $request->session()->get("IDLogin");
        // $murid = Murid::find($idMurid)->get();

        $kelas = Les::all();

        return view("murid.components.DaftarLes",[
            // "murid"=>$murid[0],
            "les"=>$kelas
        ]);
    }

    public function setSessionKelas(Request $request)
    {
        $idLes = $request->btnDetail;
        $request->session()->put("IDLesDetail",$idLes);
        return redirect("/murid_detail_kelas");
    }
    public function indexDetail(Request $request)
    {
        if($request->session()->has("message")){
            echo "<script>".$request->session()->get("message")."</script>";
        }
        $idLes = $request->session()->get("IDLesDetail");
        // $idMurid = $request->session()->get("IDLogin");

        // $kelasDiambil = Murid::find($idMurid)->les()->find($idLes);
        $murid = $request->session()->get("muridLogin");
        $kelasDiambil = $murid->les()->find($idLes);
        $kelas = Les::where('LES_ID',$idLes)->first();

        if($kelasDiambil == null){
            return view("murid.components.DetailLes",[
                "les"=>$kelas,
                "lesDiambil" => $kelasDiambil
            ]);
        }else{
            return redirect("/murid_detail_kelas_diambil");
        }
    }


}
