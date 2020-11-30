<?php

namespace App\Http\Controllers;

use App\Murid;
use App\Rules\ConfirmPasswordRule;
use App\Rules\isUsernameMuridUnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function indexProfilMurid(Request $request)
    {
        // $idMurid = $request->session()->get("IDLogin");
        // $murid = Murid::find($idMurid)->get();
        $murid = $request->session()->get("muridLogin");

        return view("murid.components.Profil",[
            // "murid"=>$murid[0]
            "murid"=>$murid
        ]);
    }

    public function simpanProfilMurid(Request $request)
    {
        // $murid = Murid::find($request->session()->get("IDLogin"))->get();
        $murid = $request->session()->get("muridLogin");
        $rule = [
            // "username" => ["required",new isUsernameMuridUnique($murid[0]->Murid_Username)],
            "username" => ["required",new isUsernameMuridUnique($murid->Murid_Username)],
            "email" => ["required","email"],
            "nama" => ["required"],
            "password" => ["required"],
            "confPassword" => ["required",new ConfirmPasswordRule($request->password)]
        ];

        $customMessage = [
            "required" => "Field tidak boleh kosong",
            "email" => "Email Tidak Valid"
        ];

        $this->validate($request,$rule,$customMessage);

        $file = $request->file('file');
        $tujuan_upload = 'foto';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        // $murid = Murid::find($request->session()->get("IDLogin"));
        $murid->Murid_Username = $request->username;
        $murid->Murid_Nama = $request->nama;
        $murid->Murid_Email = $request->email;
        $murid->Murid_Password = bcrypt($request->password);
        $murid->Murid_Photo = $file->getClientOriginalName();
        $murid->save();
        return redirect("/murid_profil");
    }

    public function indexEditProfilMurid(Request $request)
    {
        if($request->exists("btnEditProfil")){
            // $idMurid = $request->session()->get("IDLogin");
            // $murid = Murid::find($idMurid)->get();
            // $username = $murid[0]->Murid_Username;
            // $nama = $murid[0]->Murid_Nama;
            // $email = $murid[0]->Murid_Email;
            // $password = $murid[0]->Murid_Password;
            $murid = $request->session()->get("muridLogin");
            $username = $murid->Murid_Username;
            $nama = $murid->Murid_Nama;
            $email = $murid->Murid_Email;
            // $password = $murid->Murid_Password;
            $password = "";
            $photo = $murid->Murid_Photo;
        }


        return view("murid.components.EditProfil",[
            "username" => $username,
            "nama"=>$nama,
            "email"=>$email,
            "password"=>$password,
            "photo"=>$photo
        ]);
    }
}
