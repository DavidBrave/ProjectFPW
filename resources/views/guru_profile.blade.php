@extends('mainpage')
@section('content')
    <style>
        #container-profile{
            background-color: white;
            width: 800px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }
        .collection-item{
            display: inline-block;
            width: 100%;
        }
        #sertifikat{
            display: block;
            width: 30%;
            height: 30%;
            margin: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        #temp-sertifikat{
            display: grid;
            grid-template-columns: 50% 50%;
        }
    </style>
    <div id="guru-profile-container">
        @if (session("dark") == "true")
            <h2 class="center-align" style="color: white;" id="txtPersonal">Personal Info</h2>
        @else
            <h2 class="center-align" id="txtPersonal">Personal Info</h2>
        @endif
        <ul class="collection with-header" id="container-profile">
            <h4 style="color: black; margin: 20px;">Profile</h4>
            @if ($guru->Guru_Photo)
                <img src="{{asset("storage/Photos/".$guru->Guru_Photo)}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
            @else
                <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
            @endif
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Nama</p><p style="float: left; margin: 0px;"><b>{{$guru->Guru_Nama}}</b></p></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Username</p><p style="float: left; margin: 0px;"><b>{{$guru->Guru_Username}}</b></p></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Alamat</p><p style="float: left; margin: 0px;"><b>{{$guru->Guru_Alamat}}</b></p></li>
        </ul>
        <ul class="collection with-header" id="container-profile">
            <li class="collection-header"><h4 style="color: black">Contact info</h4></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Email</p><p style="float: left; margin: 0px;"><b>{{$guru->Guru_Email}}</b></p></li>
        </ul>
        <ul class="collection with-header" id="container-profile">
            <li class="collection-header"><h4 style="color: black">Sertifikat</h4></li>
            <div id="temp-sertifikat">
                @foreach ($guru->sertifikat as $item)
                    @if (!$item->Sertifikat_Photo)
                        <img src="{{asset("storage/Photos/".$item->Sertifikat_Photo)}}" id="sertifikat">
                    @else
                        <h5 style="margin: 20px;">Tidak Ada</h5>
                    @endif
                @endforeach
            </div>
        </ul>
    </div>
@endsection
