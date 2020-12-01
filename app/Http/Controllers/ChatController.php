<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Guru;
use App\Les;
use App\Murid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChat($lesId, Request $request)
    {
        $les = Les::find($lesId);
        return view('chat', ['les' => $les]);
    }

    public function send(Request $request)
    {
        $userId = "";
        if($request->session()->has("guruLogin")){
            $userId = $request->session()->get("guruLogin")->Guru_ID;
        }else if($request->session()->has("muridLogin")){
            $userId = $request->session()->get("muridLogin")->Murid_ID;
        }
        $lesId = $request->id;
        $isi = $request->isi;

        $data = [
            "Chat_ID" => null,
            "Les_ID" => $lesId,
            "Pengirim_ID" => $userId,
            "Isi_Chat" => $isi,
            "Tanggal_Terkirim" => Carbon::now()->addHour(7)
        ];
        Chat::create($data);
    }

    public function refreshChat($lesId, Request $request)
    {
        $hasil = "<table>";
        $chats = Chat::where("Les_ID", $lesId)->get();
        $userId = "";
        if($request->session()->has("guruLogin")){
            $userId = $request->session()->get("guruLogin")->Guru_ID;
        }else if($request->session()->has("muridLogin")){
            $userId = $request->session()->get("muridLogin")->Murid_ID;
        }

        foreach ($chats as $chat) {
            $waktu = $chat->Tanggal_Terkirim;
            $murid = Murid::where("Murid_ID", $chat->Pengirim_ID)->get();
            $guru = Guru::where("Guru_ID", $chat->Pengirim_ID)->get();
            $nama = "";
            $photo = "";

            if(count($murid) > 0){
                $nama = $murid[0]->Murid_Nama;
                $photo = $murid[0]->Murid_Photo;
                if($photo == ""){
                    $photo = "nophoto.png";
                }
            }else if(count($guru) > 0){
                $nama = $guru[0]->Guru_Nama;
                $photo = $guru[0]->Guru_Photo;
                if($photo == ""){
                    $photo = "nophoto.png";
                }
            }

            $url = url("/storage/Photos/".$photo);
            if($chat->Pengirim_ID == $userId){
                $hasil = $hasil."<tr style='border-bottom: none;'><td style='padding-left: 10px; padding-right: 10px;'><div class='kotak-chat2'><div style='display: inline-block;'><img src='{$url}' class='pp-mini' style='margin-left: 5px; float: right;'><p style='margin: 0px; font-weight: bold; float: right;'>$nama</p></div><p style='margin: 0px;'>$chat->Isi_Chat</p></div><p style='float: right; margin: 10px; font-size: 13px;'>$waktu</p></td></tr>";
            }else{
                $hasil = $hasil."<tr style='border-bottom: none;'><td style='padding-left: 10px; padding-right: 10px;'><div class='kotak-chat1'><div style='display: inline-block;'><img src='{$url}' class='pp-mini' style='margin-right: 5px;'><p style='margin: 0px; font-weight: bold; float: left;'>$nama</p></div><p style='margin: 0px;'>$chat->Isi_Chat</p></div><p style='float: left; margin: 10px; font-size: 13px;'>$waktu</p></td></tr>";
            }
        }
        $hasil = $hasil."</table>";
        echo $hasil;

        // <table>
        //     <tr style="border-bottom: none;">
        //         <td style="padding-left: 10px; padding-right: 10px;">
        //             <div class="kotak-chat1">
        //                 <div style="display: inline-block;">
        //                     <img src="{{asset("storage/Photos/nophoto.png")}}" class="pp-mini" style="margin-right: 5px;">
        //                     <p style="margin: 0px; font-weight: bold; float: left;">Nama</p>
        //                 </div>
        //                 <p style="margin: 0px;">tes</p>
        //             </div>
        //             <p style="float: left; margin: 10px; font-size: 13px;">jam</p>
        //         </td>
        //     </tr>
        //     <tr style="border-bottom: none;">
        //         <td style="padding-left: 10px; padding-right: 10px;">
        //             <div class="kotak-chat2">
        //                 <div style="display: inline-block;">
        //                     <img src="{{asset("storage/Photos/nophoto.png")}}" class="pp-mini" style="margin-left: 5px; float: right;">
        //                     <p style="margin: 0px; font-weight: bold; float: right;">Nama</p>
        //                 </div>
        //                 <p style="margin: 0px;">tes</p>
        //             </div>
        //             <p style="float: right; margin: 10px; font-size: 13px;">jam</p>
        //         </td>
        //     </tr>
        // </table>
    }

    public function showAllChat(Request $request)
    {
        $userId = "";
        if($request->session()->has("guruLogin")){
            $userId = $request->session()->get("guruLogin")->Guru_ID;
            $les = Les::where("Guru_ID", $userId)->get();
        }else if($request->session()->has("muridLogin")){
            $userId = $request->session()->get("muridLogin")->Murid_ID;
            $les = Murid::find($userId)->les;
        }
        return view("all_chat", ["les" => $les]);
    }
}
