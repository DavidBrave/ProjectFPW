<?php

namespace App\Http\Controllers;


use App\Guru;
use App\Murid;
use App\Rules\cekConfGuru;
use App\Rules\cekConfMurid;
use App\Rules\cekEmail;
use App\Rules\UsernameAda;

use App\Admin;
use App\Sertifikat;
use App\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function ShowLogin()
    {
        return view("login");
    }

    public function registerMurid(Request $request){
        $rules = [
            'username' =>['required', 'min:8', 'max:24', new UsernameAda],
            'name' =>['required'],
            'password' =>['required', 'min:8', 'max:24'],
            'confirm' =>['required', new cekConfMurid($request->password)],
            'email' =>['required', new cekEmail],
            'file' => ['required'],
        ];

        $customError = [
            'required' => ':attribute harus diisi',
            'min' => ":attribute minimal harus 8 karakter",
            'max' => ":attribute maximal harus 24 karakter",
        ];

        $this->validate($request, $rules, $customError);

        $user = $request->username;
        $pass = bcrypt($request->password);
        $email = $request->email;
        $name = $request->name;
        $tingkat = $request->tingkat;
        $file = $request->file('file');

        $tujuan_upload = 'foto';
        $file->move($tujuan_upload, $file->getClientOriginalName());


        $allMurid = Murid::select('*')->get();
        $dataMurid = $allMurid[count($allMurid)-1];
        $angka = substr($dataMurid->Murid_ID,3,4)+1;
        if($angka>999){
            $id = "MRD".$angka;
        }else if ($angka>99){
            $id = "MRD0".$angka;
        }else if ($angka>9){
            $id = "MRD00".$angka;
        }else {
            $id = "MRD000".$angka;
        }

        $newMurid = new Murid;
        $newMurid->Murid_ID = $id;
        $newMurid->Murid_Username = $user ;
        $newMurid->Murid_Password = $pass;
        $newMurid->Murid_Nama = $name;
        $newMurid->Murid_Tingkat = $tingkat;
        $newMurid->Murid_Email = $email;
        $newMurid->Murid_Photo = $file->getClientOriginalName();

        $newMurid->save();

        echo "<script>alert('Register Berhasil')</script>";

        $data = Tingkat::select('*')->get();
        return view('register',["tingkat"=>$data]);
    }

    public function Login(Request $request)
    {

        $dataAdmin = [
            "Admin_Username" => $request->username,
            "password" => $request->password,
        ];

        $dataMurid = [
            "Murid_Username" => $request->username,
            "password" => $request->password,
        ];

        $dataGuru = [
            "Guru_Username" => $request->username,
            "password" => $request->password,
        ];

        if(Auth::guard('murid_guard')->attempt($dataMurid)){
            $murid = Murid::where("Murid_Username", $request->username)->get();
            $request->session()->put('muridLogin', $murid[0]);
            $request->session()->put('IDLogin', $murid[0]->Murid_ID);
            //return redirect('/murid_home');
            return redirect('/');
        }else if (Auth::guard('guru_guard')->attempt($dataGuru)){
            $guru = Guru::where("Guru_Username", $request->username)->get();
            $request->session()->put('guruLogin', $guru[0]);
            return redirect('/');
        }else if(Auth::guard('admin_guard')->attempt($dataAdmin)){
            $admin = Admin::where("Admin_Username", $request->username)->get();
            $request->session()->put('adminLogin', $admin[0]);
            return redirect('/');
        }else{
            return redirect("/login")->with("pesan","Username atau password salah");
        }

    }

    public function showRegister()
    {
        $data = Tingkat::select('*')->get();
        return view("register", ["tingkat"=>$data]);
    }


    public function registerPengajar(Request $request)
    {
        $rules = [
            'username' =>['required', 'min:8', 'max:24', new UsernameAda],
            'name' =>['required'],
            'password' =>['required', 'min:8', 'max:24'],
            'confirm' =>['required', new cekConfGuru($request->password)],
            'email' =>['required', new cekEmail],
            'address' => ['required'],
            'file' => ['required']
        ];

        $customError = [
            'required' => ':attribute harus diisi',
            'min' => ":attribute minimal harus 8 karakter",
            'max' => ":attribute maximal harus 24 karakter",
        ];

        $this->validate($request, $rules, $customError);


        $user = $request->username;
        $pass = bcrypt($request->password);
        $email = $request->email;
        $name = $request->name;
        $alamat = $request->address;
        $file = $request->file('file');
        $lampiran = array();
        if($files = $request->file('myfile')){
            foreach($files as $item){
                $name = $item->getClientOriginalName();
                $item->move('lampiran', $name);
                $lampiran[] = $name;
            }
        }


        $tujuan_upload = 'foto';
        $file->move($tujuan_upload, $file->getClientOriginalName());


        $allGuru = Guru::select('*')->get();
        $dataGuru = $allGuru[count($allGuru)-1];
        $angka = substr($dataGuru->Guru_ID,3,4)+1;
        if($angka>999){
            $id = "GRU".$angka;
        }else if ($angka>99){
            $id = "GRU0".$angka;
        }else if ($angka>9){
            $id = "GRU00".$angka;
        }else {
            $id = "GRU000".$angka;
        }
        $newGuru = new Guru;
        $newGuru->Guru_ID = $id;
        $newGuru->Guru_Username = $user ;
        $newGuru->Guru_Password = $pass;
        $newGuru->Guru_Alamat = $alamat;
        $newGuru->Guru_Nama = $name;
        $newGuru->Guru_Email = $email;
        $newGuru->Guru_Photo = $file->getClientOriginalName();
        $newGuru->Diterima = 0;

        $newGuru->save();

        foreach($lampiran as $temp){
            $newSerti = new Sertifikat;
            $newSerti->id = null;
            $newSerti->Guru_ID = $id;
            $newSerti->Sertifikat_Photo = $temp;
            $newSerti->save();
        }

        echo "<script>alert('Register Berhasil')</script>";

        $data = Tingkat::select('*')->get();
        return view('register',["tingkat"=>$data]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(["muridLogin", "guruLogin", "adminLogin","IDLogin"]);
        return redirect("/");

    }
}
