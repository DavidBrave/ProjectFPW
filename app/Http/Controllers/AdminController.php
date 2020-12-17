<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Guru;
use App\Les;
use App\Murid;
use App\Pelajaran;
use App\Rules\cekNamaPelajaran;
use App\Rules\cekUsername;
use App\Sertifikat;
use App\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Home()
    {

        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }

        return view('admin.home');
    }

    public function Profile()
    {
        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }


        return view('admin.adminProfile', [
            'admin' => $admin
        ]);
    }

    public function GuruBaru()
    {

        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }

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

        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }


        if ($request->type == "detail") {
            $guru = Guru::where('Guru_ID', '=', $request->guru_id)->first();
            return view('admin.profileGuru', ["guru" => $guru]);
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

        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }

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

        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }


        $rules = [
            'nama_pelajaran' => ['required', new cekNamaPelajaran($request->nama_pelajaran)]
        ];

        $custom_error = [
            'nama_pelajaran.required' => 'Nama Pelajaran Harus Diisi'
        ];

        $this->validate($request, $rules, $custom_error);

        $pelajaran = Pelajaran::all();

        $valid = true;
        $ctr = 0;
        foreach ($pelajaran as $p) {
            if (strtoupper($p->Pelajaran_Nama) == strtoupper($request->nama_pelajaran) || $request->nama_pelajaran == "") {
                $valid = false;
                return Redirect::back()->withErrors(['Pelajaran Sudah Terdapat Pada Database']);
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
            $pelajaran->Pelajaran_Nama = $request->nama_pelajaran;

            $pelajaran->save();

        }

        return redirect('/admin/insert/pelajaran');
    }

    public function Admin()
    {
        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }

        return view('admin.insertAdmin');
    }

    public function InsertAdmin(Request $request)
    {
        $admin =  session()->get("adminLogin");
        if ($admin == null) {
            return redirect('/');
        }


        $rules = [
            'nama_admin' => ['required'],
            'username_admin' => ['required', new cekUsername($request->username_admin)],
            'password_admin' => ['required'],
            'konfirmasi_admin' => ['same:password_admin'],
        ];

        $custom_error = [
            'nama_admin.required' => 'Nama Admin Harus Diisi',
            'username_admin.required' => 'Username Admin Harus Diisi',
            'password_admin.required' => 'Password Admin Harus Diisi',
            'konfirmasi_admin.same' => 'Konfirmasi Harus Sama Dengan Password',
        ];


        $this->validate($request, $rules, $custom_error);



        $admins = Admin::all();

        $valid = true;
        $ctr = 0;
        foreach ($admins as $a) {
            if (strtoupper($a->Admin_Username) == strtoupper($request->username_admin)) {
                $valid = false;
                return Redirect::back()->withErrors(['Admin Sudah Terdaftar']);
            }
            $ctr = (int) substr($a->Admin_ID, 3);
            $ctr = $ctr + 1;
        }

        $ctr = (string) $ctr;
        $id_admin = "";
        if ($valid) {
            $id = str_pad($ctr, 4, "0", STR_PAD_LEFT);
            $id_admin = "ADM".$id;

            $admin = new Admin();
            $admin->Admin_ID = $id_admin;
            $admin->Admin_Nama = $request->nama_admin;
            $admin->Admin_Username = $request->username_admin;
            $admin->Admin_Password = bcrypt($request->password_admin);

            $admin->save();

        }

        return redirect('/');
    }

    public function showChart(Request $request)
    {
        $arr1 = [];
        $arr2 = [];
        $arr3 = [];
        $guru = Guru::all();
        for ($i=0; $i < count($guru); $i++) {
            $jumlahMurid = Guru::join('Les', 'Les.Guru_ID', '=', 'Guru.Guru_ID')
            ->join('Pengambilan_Pelajaran', 'Pengambilan_Pelajaran.Pengambilan_Les', '=', 'Les.Les_ID')
            ->where("Guru.Guru_ID", $guru[$i]->Guru_ID)->get(['Pengambilan_Pelajaran.Pengambilan_Murid']);
            array_push($arr2, count($jumlahMurid));
            array_push($arr1, $guru[$i]->Guru_ID);
            array_push($arr3, $guru[$i]->Guru_Nama);
        }
        return view('admin.grafik', ["arr1" => json_encode($arr1), "arr2" => json_encode($arr2), "arr3" => json_encode($arr3)]);
    }
}
