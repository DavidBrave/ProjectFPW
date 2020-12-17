<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Les;
use App\Murid;
use App\Tingkat;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function indexKelas(Request $request)
    {
        // $idMurid = $request->session()->get("IDLogin");
        // $murid = Murid::find($idMurid)->get();
        // $kelas = Les::select("*");
        // if($request->btnCari == "-1"){
        //     if($request->edCari != ""){
        //         $kelas = Les::where("Nama","LIKE","%".$request->edCari."%");
        //         $idGurus = Guru::where("Guru_Nama","LIKE","%".$request->edCari."%")->get();
        //         if($idGurus!=null){
        //             foreach ($idGurus as $item) {
        //                 $kelas = $kelas->orWhere("Guru_ID",$item->Guru_ID);
        //             }
        //         }
        //     }
        //     if($request->tingkatan != "none"){
        //         $kelas = $kelas->where("Tingkatan_ID",$request->tingkatan);
        //     }
        // }

        // $tingkatan = Tingkat::all();

        $kelas = Les::select("*");
        if($request->btnCari == "-1"){
            if($request->tingkatan != ""){
                $kelas = $kelas->where("Tingkatan_ID",$request->tingkatan);
                if($request->name != ""){
                    $kelas = $kelas->where("Nama","like","%".$request->name."%");
                    $idGurus = Guru::where("Guru_Nama","LIKE","%".$request->name."%")->get();
                    if(sizeof($idGurus) > 0){
                        foreach ($idGurus as $item) {
                            $kelas = $kelas->orWhere("Guru_ID",$item->Guru_ID);
                        }
                    }
                }
            }else{
                if($request->name != ""){
                    $kelas = Les::where("Nama","like","%".$request->name."%");
                    $idGurus = Guru::where("Guru_Nama","LIKE","%".$request->name."%")->get();
                    if(sizeof($idGurus) > 0){
                        foreach ($idGurus as $item) {
                            $kelas = $kelas->orWhere("Guru_ID",$item->Guru_ID);
                        }
                    }
                }
            }
        }
        $tingkatan = Tingkat::all();
        return view("murid.components.DaftarLes",[
            // "murid"=>$murid[0],
            "les"=>$kelas->get(),
            "tingkatan"=>$tingkatan
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
