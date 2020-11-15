@extends('mainpage')
@section('content')
    <style>
        #container{
            grid-template-rows: 120px 1200px 100px;
        }
        .collection.with-header{
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
            margin: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            background-position: center;
            background-size: 35%;
            background-repeat: no-repeat;
        }
        .carousel.carousel-slider .carousel-item {
            width: 35%;
            height: 35%;
            position: absolute;
        }
        img.materialboxed{
            width: 100%;
            height: 100%;
        }
        img.materialboxed.active{
            margin-top: 70px;
        }
    </style>
    <div id="guru-profile-container">
        @if (session("dark") == "true")
            <h2 class="center-align" style="color: white;" id="txtPersonal">Personal Info</h2>
        @else
            <h2 class="center-align" id="txtPersonal">Personal Info</h2>
        @endif
        <ul class="collection with-header">
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
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color: black">Contact info</h4></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Email</p><p style="float: left; margin: 0px;"><b>{{$guru->Guru_Email}}</b></p></li>
        </ul>
        <ul class="collection with-header" style="padding: 20px;">
            <li class="collection-header" style="padding: 0px;"><h4 style="color: black">Sertifikat</h4></li>
            <div class="carousel carousel-slider">
                @foreach ($guru->sertifikat as $item)
                    @if ($item->Sertifikat_Photo)
                        <div class="carousel-item"><img class="materialboxed" src="{{asset("storage/Photos/".$item->Sertifikat_Photo)}}" style="top: -269px;"></div>
                    @else
                        <h5 style="margin: 20px;">Tidak Ada</h5>
                    @endif
                @endforeach
            </div>
        </ul>
    </div>
@endsection
