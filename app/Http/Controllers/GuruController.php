<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Les;
use App\Pelajaran;
use App\Tingkat;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function profile(Request $request)
    {
        $guru =  $request->session()->get("guruLogin");
        return view("guru_profile", ["guru" => $guru]);
    }

    public function createClass()
    {
        $pelajaran = Pelajaran::all();
        $tingkatan = Tingkat::all();
        return view("create_class", ["pelajaran" => $pelajaran, "tingkatan" => $tingkatan]);
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

        return redirect("/create_class")->with("pesan", "Berhasil menambahkan kelas ".$request->name);
    }
}
