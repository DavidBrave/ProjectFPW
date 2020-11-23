<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Les;
use App\Murid;
use App\Pelajaran;
use App\Sertifikat;
use App\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function profile(Request $request)
    {
        $guru =  $request->session()->get("guruLogin");
        return view("guru.guru_profile", ["guru" => $guru]);
    }

    public function createClass()
    {
        $pelajaran = Pelajaran::all();
        $tingkatan = Tingkat::all();
        return view("guru.create_class", ["pelajaran" => $pelajaran, "tingkatan" => $tingkatan]);
    }

    public function tambahKelas(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'pelajaran' => ['required'],
            'tingkatan' => ['required'],
            'slot' => ['required', 'gt:5'],
            'waktu' => ['required']
        ];
        $customError = [
            'name.required' => 'Nama harus diisi',
            'pelajaran.required' => 'Pelajaran harus dipilih',
            'tingkatan.required' => 'Tingkat pendidikan harus dipilih',
            'slot.required' => 'Slot harus diisi',
            'slot.gt' => 'Jumlah slot minimal 5',
            'waktu.required' => 'Pilih waktu terlebih dahulu'
        ];
        $this->validate($request, $rules, $customError);

        $last = Les::all()->last();
        $angka = (int)substr($last->Les_ID,3,4) + 1;
        $id = "";
        if($angka < 10){
            $id = "LES000".$angka;
        }else if($angka < 100){
            $id = "LES00".$angka;
        }else if($angka < 1000){
            $id = "LES0".$angka;
        }else{
            $id = "LES".$angka;
        }

        $les = [
            "Les_ID" => $id,
            "Nama" => $request->name,
            "Guru_ID" => $request->session()->get('guruLogin')->Guru_ID,
            "Pelajaran_ID" => $request->pelajaran,
            "Tingkatan_ID" => $request->tingkatan,
            "Slot" => $request->slot,
            "Sisa_Slot" => $request->slot,
            "Rating" => 0,
            "Jum_Orang_Rating" => 0,
            "Deskripsi" => $request->deskripsi,
            "Jam_Les" => $request->waktu
        ];
        Les::create($les);

        return redirect("/guru/create_class")->with("pesan", "Berhasil menambahkan kelas ".$request->name);
    }

    public function showTerimaTolakMurid(Request $request)
    {
        $id = $request->session()->get("guruLogin")->Guru_ID;
        $murid = Guru::find($id)->les;

        $les = Les::all();
        $muridTemp = [];
        foreach ($les as $key) {
            if($key->Guru_ID == $id){
                array_push($muridTemp, $murid->find($key->Les_ID)->murid);
            }
        }

        $arrMurid = [];
        for ($i=0; $i < count($muridTemp); $i++) {
            for ($j=0; $j < count($muridTemp[$i]); $j++) {
                if($muridTemp[$i][$j] != null && $muridTemp[$i][$j]->pivot->Pengambilan_Status != 2  && $muridTemp[$i][$j]->pivot->Pengambilan_Status != 1){
                    array_push($arrMurid, $muridTemp[$i][$j]);
                }
            }
        }
        // dd($arrMurid[0]->pivot->pivotParent);
        return view('guru.terima_tolak_murid', ["murid" => $arrMurid]);
    }

    public function terima($muridId, $lesId, Request $request)
    {
        $id = $request->session()->get("guruLogin")->Guru_ID;
        $tes = Guru::find($id)->les()->find($lesId)->murid()->find($muridId);
        $tes->pivot->Pengambilan_Status = 2;
        $tes->pivot->save();

        $namaMurid = $tes->Murid_Nama;
        $namaLes = $tes->pivot->pivotParent->Nama;
        $request->session()->flash("message", $namaMurid." diterima di ".$namaLes);
        return redirect("/guru/terima_tolak_murid");
    }

    public function tolak($muridId, $lesId, Request $request)
    {
        $id = $request->session()->get("guruLogin")->Guru_ID;
        $tes = Guru::find($id)->les()->find($lesId)->murid()->find($muridId);
        $tes->pivot->Pengambilan_Status = 1;
        $tes->pivot->save();

        $namaMurid = $tes->Murid_Nama;
        $namaLes = $tes->pivot->pivotParent->Nama;
        $request->session()->flash("message", $namaMurid." ditolak dari ".$namaLes);
        return redirect("/guru/terima_tolak_murid");
    }
}
