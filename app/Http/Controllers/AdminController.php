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

class AdminController extends Controller
{
    public function Home()
    {
        return view('admin.home');
    }

    public function GuruBaru()
    {
        $semua_guru = Guru::all();

        $guru_baru = [];
        foreach ($semua_guru as $guru) {
            if ($guru->Diterima == 0) {
                $guru_baru[] = $guru;
            }
        }

        return view('admin.guruBaru', [
            'guru_baru' => $guru_baru
        ]);

    }


    public function ActionGuruBaru(Request $request)
    {

        if ($request->type == "detail") {
            #detail profile guru
        }
        if ($request->type == "accept") {
            Guru::where('Guru_ID', '=', $request->guru_id)->update(['Diterima' => 1]);
        }
        if ($request->type == "reject") {
            Guru::where('Guru_ID', '=', $request->guru_id)->update(['Diterima' => -1]);
        }

        return redirect('admin/guru/baru');
    }


    public function Pelajaran()
    {
        $pelajaran = Pelajaran::all();
        $list_les = Les::all();

        $list_pelajaran = [];

        $nomor = 1;
        foreach ($pelajaran as $p) {

            $ctr = 0;
            foreach ($list_les as $les) {
                if ($les->Pelajaran_ID == $p->Pelajaran_ID) {
                    $ctr = $ctr + 1;
                }
            }

            $mapel = (object) [
                'no' => $nomor,
                'id' => $p->Pelajaran_ID,
                'name' => $p->Pelajaran_Nama,
                'ctr' => $ctr,
            ];

            $list_pelajaran[] = $mapel;
            $nomor = $nomor + 1;
        }


        return view('admin.insertPelajaran', [
            'list_pelajaran' => $list_pelajaran
        ]);
    }


    public function InsertPelajaran(Request $request)
    {
        $pelajaran = Pelajaran::all();

        $valid = true;
        $ctr = 0;
        foreach ($pelajaran as $p) {
            if (strtoupper($p->Pelajaran_Nama) == strtoupper($request->name) || $request->name == "") {
                $valid = false;
            }
            $ctr = (int) substr($p->Pelajaran_ID, 3);
            $ctr = $ctr + 1;
        }


        $ctr = (string) $ctr;
        $id_pelajaran = "";
        if ($valid) {
            $id = str_pad($ctr, 4, "0", STR_PAD_LEFT);
            $id_pelajaran = "PLJ".$id;

            $pelajaran = new Pelajaran();
            $pelajaran->Pelajaran_ID = $id_pelajaran;
            $pelajaran->Pelajaran_Nama = $request->name;

            //dd($pelajaran);

            $pelajaran->save();

        }


        return redirect('/admin/insert/pelajaran');



    }


}
