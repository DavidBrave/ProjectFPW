<?php

namespace App\Http\Controllers;

use App\Guru;
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
        ];
        $customError = [
            'name.required' => 'Nama harus diisi',
            'pelajaran.required' => 'Pelajaran harus dipilih',
            'tingkatan.required' => 'Tingkat pendidikan harus dipilih',
            'slot.required' => 'Slot harus diisi',
            'slot.gt' => 'Jumlah slot minimal 5'
        ];
        $this->validate($request, $rules, $customError);

        return redirect("/create_class");
    }
}
