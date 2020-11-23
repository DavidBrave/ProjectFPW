<?php

namespace App\Http\Controllers;

use App\Les;
use App\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasMuridController extends Controller
{
    public function indexMuridKelas(Request $request)
    {
        $idMurid = $request->session()->get("IDLogin");

        $kelasDiambil = Murid::where("Murid_ID",$idMurid)->first()->les;
        return view("murid.components.LesYgDiambil",[
            "leslesan"=>$kelasDiambil
        ]);
    }

    public function setSessionKelasMurid(Request $request)
    {
        $idLes = $request->btnDetail;
        $request->session()->put("IDLesDetail",$idLes);
        return redirect("/murid_detail_kelas_diambil");
    }

    public function ratingLes(Request $request)
    {
        // $murid = Murid::find($request->session()->get("IDLogin"));
        $murid = $request->session()->get("muridLogin");
        $lesDiambil = $murid->les()->find($request->session()->get("IDLesDetail"));

        return view("murid.components.RatingKelasDiambil",[
            "les" => $lesDiambil
        ]);
    }

    public function muridKeluarKelas(Request $request)
    {
        $rating = $request->btnRate;
        $les = Les::find($request->session()->get("IDLesDetail"))->first();
        $ratingles = $les->Rating;
        $jumOrangRating = $les->Jum_Orang_Rating;
        $sisaSlot = $les->Sisa_Slot + 1;
        $ratingles = ($jumOrangRating*$ratingles)+$rating;
        $ratingles = $ratingles/($jumOrangRating+1);

        $les1 = Les::find($request->session()->get("IDLesDetail"));
        $les1->Rating = $ratingles;
        $les1->Jum_Orang_Rating = $jumOrangRating + 1;
        $les1->Sisa_Slot = $sisaSlot;
        $les1->save();

        // $murid = Murid::find($request->session()->get("IDLogin"));
        $murid = $request->session()->get("muridLogin");
        $murid->les()->detach($les1);

        $request->session()->flash("message","Berhasil Keluar dari Les");
        return redirect("/murid_detail_kelas");
    }

    public function indexDetailMuridKelas(Request $request)
    {
        // $murid = Murid::find($request->session()->get("IDLogin"));
        $murid = $request->session()->get("muridLogin");
        $lesDiambil = $murid->les()->find($request->session()->get("IDLesDetail"));

        return view("murid.components.DetailLesDiambil",[
            "les" => $lesDiambil
        ]);
    }
    public function tambahKeKelasDiambil(Request $request)
    {
        // $murid = Murid::find($request->session()->get("IDLogin"));
        $murid = $request->session()->get("muridLogin");
        $les = Les::find($request->session()->get("IDLesDetail"));

        $max = -1;
        $murids = Murid::all();
        foreach ($murids as $item) {
            if($item->les != null){
                foreach ($item->les as $item2) {
                    $IDpengajuanLes = (int) substr($item2->pivot->Pengambilan_ID,3);
                    if($max<$IDpengajuanLes){
                        $max = $IDpengajuanLes;
                    }
                }
            }
        }
        $idPengambilan = "MLB".str_pad(($max+1)."",4,"0",STR_PAD_LEFT);

        $murid->les()->attach($les,[
            "PENGAMBILAN_ID" => $idPengambilan,
            "PENGAMBILAN_STATUS" => 0
        ]);

        $request->session()->flash("message","Permintaan untuk join les berhasil diajukan");
        return redirect("/murid_detail_kelas_diambil");
    }

    public function HapusDariPengajuanJoin(Request $request)
    {
        // $murid = Murid::find($request->session()->get("IDLogin"))->first();
        $murid = $request->session()->get("muridLogin");
        // $les = Les::find($request->session()->get("IDLesDetail"))->first();
        $les = Les::find($request->session()->get("IDLesDetail"));
        $murid->les()->detach($les);
        $request->session()->flash("message","Permintaan untuk join les berhasil dibatalkan");
        return redirect("/murid_detail_kelas");
    }
}
