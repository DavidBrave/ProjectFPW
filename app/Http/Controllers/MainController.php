<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Les;
use App\Tingkat;
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

    public function courses(Request $request)
    {
        $kelas = Les::select("*");
        if($request->btnCari == "-1"){
            if($request->tingkatan != "none"){
                $kelas = $kelas->where("Tingkatan_ID",$request->tingkatan);
            }
            if($request->edCari != ""){
                $kelas = $kelas->where("Nama","LIKE","%".$request->edCari."%");
                $idGurus = Guru::where("Guru_Nama","LIKE","%".$request->edCari."%")->get();
                foreach ($idGurus as $item) {
                    $kelas = $kelas->orWhere("Guru_ID",$item->Guru_ID);
                }
            }
        }

        $tingkatan = Tingkat::all();
        return view("courses", ["les" => $kelas->get(), "tingkatan" => $tingkatan]);
    }

    public function detailCourse(Request $request)
    {
        $les = Les::find($request->id);
        return view("detail", ["les" => $les]);
    }
}
