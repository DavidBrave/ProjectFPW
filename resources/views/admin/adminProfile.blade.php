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
        .carousel.carousel-slider {
            margin-top: 20px;
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

            <img src="{{asset("Images/admin_transparant_background.png")}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">

            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Nama</p><p style="float: left; margin: 0px;"><b>{{ $admin->Admin_Nama }}</b></p></li>

            <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Username</p><p style="float: left; margin: 0px;"><b>{{ $admin->Admin_Username }}</b></p></li>
        </ul>

    </div>
@endsection
