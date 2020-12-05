<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Guru;
use App\Les;
use App\Mail\TaskMail;
use App\Murid;
use App\Pelajaran;
use App\Rules\cekEmail;
use App\Rules\cekUsername;
use App\Rules\UsernameAda;
use App\Sertifikat;
use App\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $tes->pivot->pivotParent->Sisa_Slot = $tes->pivot->pivotParent->Sisa_Slot - 1;
        $tes->pivot->pivotParent->save();
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

    public function showTutupKelas(Request $request)
    {
        $id = $request->session()->get("guruLogin")->Guru_ID;
        $les = Guru::find($id)->les;
        return view('guru.tutup_kelas', ["les" => $les]);
    }

    public function tutup(Request $request)
    {
        $lesId = $request->id;
        $namaLes = Les::find($lesId)->Nama;
        Les::find($lesId)->delete();
        $request->session()->flash("message", "Berhasil menutup les $namaLes");
        return redirect("guru/tutup_kelas");
    }

    public function showKelasGuru(Request $request)
    {
        $id = $request->session()->get("guruLogin")->Guru_ID;
        $les = Guru::find($id)->les;
        return view('guru.kelas', ["les" => $les]);
    }

    public function detailKelas($id, Request $request)
    {
        $les = Les::where("Les_ID", $id)->get();
        return view("guru.detail_kelas", ["les" => $les[0]]);
    }

    public function showKirimTugas($id, Request $request)
    {
        $les = Les::where("Les_ID", $id)->get();
        return view("guru.kirim_tugas", ["les" => $les[0]]);
    }

    public function showEdit(Request $request)
    {
        $guru = $request->session()->get("guruLogin");
        return view("guru.edit_profile", ["guru" => $guru]);
    }

    public function edit(Request $request)
    {
        $dosenUsername = $request->session()->get("guruLogin")->Guru_Username;

        if($request->hasFile('imgfile')){
            $rules = [
                'name' => ['required'],
                'username' => ['required', new cekUsername($dosenUsername)],
                'email' => ['required', 'regex:/^.+@.+$/i', 'regex:/^.*(?=.*[.]).*$/'],
                'confirm' => ['same:password'],
                'imgfile' => ['image', 'max:3072'],
                'alamat' => ['required']
            ];

            $customError = [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'email.required' => 'Email harus diisi',
                'email.regex' => 'Format email salah',
                'confirm.same' => 'Konfirmasi password salah',
                'imgfile.image' => 'Format harus gambar',
                'imgfile.max' => 'Maksimal 3MB',
                'alamat.required' => 'Alamat harus diisi'
            ];
        }else{
            $rules = [
                'name' => ['required'],
                'username' => ['required', new cekUsername($dosenUsername)],
                'email' => ['required', 'regex:/^.+@.+$/i', 'regex:/^.*(?=.*[.]).*$/'],
                'confirm' => ['same:password'],
                'alamat' => ['required'],
            ];

            $customError = [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'email.required' => 'Email harus diisi',
                'email.regex' => 'Format email salah',
                'confirm.same' => 'Konfirmasi password salah',
                'alamat.required' => 'Alamat harus diisi'
            ];
        }
        $this->validate($request, $rules, $customError);

        $name = $request->name;
        $username = $request->username;
        $password = $request->password;
        $confirm = $request->confirm;
        $email = $request->email;
        $imgfile = $request->file('imgfile');
        $alamat = $request->alamat;

        $guruId = $request->session()->get("guruLogin")->Guru_ID;
        $guru = Guru::find($guruId);
        $guru->Guru_Username = $username;
        $guru->Guru_Nama = $name;
        $guru->Guru_Email = $email;
        $guru->Guru_Alamat = $alamat;

        if($password != null){
            $guru->Guru_Password = bcrypt($password);
        }

        if($request->hasFile('imgfile')){
            $filename = pathinfo($imgfile->getClientOriginalName(), PATHINFO_FILENAME)."_".time().".".$imgfile->getClientOriginalExtension();
            $imgfile->storeAs("public/Photos", $filename);
            $guru->Guru_Photo = $filename;
        }

        $guru->save();
        $guru = Guru::find($guruId);
        $request->session()->put('guruLogin', $guru);

        return redirect("/guru/edit_profile");
    }

    public function kirim(Request $request)
    {
        $rules = [
            'myfile' => ["required"]
        ];

        $customError = [
            'myfile.required' => "Pilih file yang ingin dikirim"
        ];

        $this->validate($request, $rules, $customError);

        $guruEmail = $request->session()->get("guruLogin")->Guru_Email;
        $lesId = $request->id;
        $les = Les::find($lesId);
        $namaLes = $les->Nama;
        $files = $request->file('myfile');
        $desc = $request->desc;

        $checkSize = true;
        foreach ($files as $file) {
            $size = $file->getSize();
            if($size > 15728640){ //15MB
                $checkSize = false;
            }
        }

        if($checkSize){
            $allowedFileExtension = ['pdf', 'docx', 'pptx', 'zip', 'png', 'jpg', 'jpeg'];
            $check = false;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            }

            if($check){
                $data = [];
                foreach ($files as $file) {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)."_".time().".".$file->getClientOriginalExtension();
                    array_push($data, $filename);
                    $file->storeAs("public/Lampiran_Tugas", $filename);
                }
                foreach ($les->murid as $m) {
                    Mail::to($m->Murid_Email)->send(new TaskMail($guruEmail, "Tugas ".$namaLes, $desc, $data));
                }
                $request->session()->flash('message', 'File berhasil dikirim');
                return back();
            }else{
                $request->session()->flash('pesan', 'Format file tidak sesuai');
                return back();
            }
        }else{
            $request->session()->flash('pesan', 'Besar file maksimal 15MB');
            return back();
        }
    }
}
