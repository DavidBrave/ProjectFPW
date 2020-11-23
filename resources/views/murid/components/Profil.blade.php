@extends('mainpage')
@section('content')
    <style>
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
        .carousel.carousel-slider {
            margin-top: 20px;
        }
    </style>
    <div id="murid-profile-container">
        @if (session("dark") == "true")
            <h2 class="center-align" style="color: white;" id="txtPersonal">Personal Info</h2>
        @else
            <h2 class="center-align" id="txtPersonal">Personal Info</h2>
        @endif
        <ul class="collection with-header">
            <h4 style="color: black; margin: 20px;">Profile</h4>
            @if ($murid->Murid_Photo)
                <img src="{{asset("storage/Photos/".$murid->Murid_Photo)}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
            @else
                <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
            @endif
            <form action="/murid_edit_profil" method="get">
                <button class="btn waves-effect blue lighten-1" type="submit" name="btnEditProfil" value="1" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 50px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px;">Edit Profil<i class="material-icons right" style="margin-left: 5px;">edit</i></button>
            </form>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Nama</p><p style="float: left; margin: 0px;"><b>{{$murid->Murid_Nama}}</b></p></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Username</p><p style="float: left; margin: 0px;"><b>{{$murid->Murid_Username}}</b></p></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Tingkat Pendidikan</p><p style="float: left; margin: 0px;"><b>{{$murid->tingkatan->Pendidikan_Keterangan}}</b></p></li>
        </ul>
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color: black">Contact info</h4></li>
            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Email</p><p style="float: left; margin: 0px;"><b>{{$murid->Murid_Email}}</b></p></li>
        </ul>
    </div>
@endsection

