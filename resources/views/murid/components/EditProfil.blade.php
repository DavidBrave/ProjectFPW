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
        .collection .collection-item{
            display: inline-block;
            width: 100%;
            border-bottom: none;
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
            <h2 class="center-align" style="color: white;" id="txtPersonal">Edit Profile</h2>
        @else
            <h2 class="center-align" id="txtPersonal">Personal Info</h2>
        @endif
        <form action="/murid_simpan_profil" method="POST">
            @csrf
            <ul class="collection with-header">
                <h4 style="color: black; margin: 20px;">Profile</h4>
                @if ($photo)
                    <img src="{{asset("storage/Photos/".$photo)}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
                @else
                    <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin: 20px; display: block; margin-left: auto; margin-right: auto;">
                @endif
                <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Nama</p><p style="float: left; margin: 0px;"><input type="text" name="nama" value="{{$nama}}" style="width: 300px;" placeholder="Type your name">
                    @error('nama')
                        <span style="color: red">{{$message}}</span>
                    @enderror</p>
                </li>
                <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Username</p><p style="float: left; margin: 0px;"><input type="text" name="username" value="{{$username}}" style="width: 300px;" placeholder="Type your username">
                    @error('username')
                        <span style="color: red">{{$message}}</span>
                    @enderror</p>
                </li>
                <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Email</p><p style="float: left; margin: 0px;"><input type="text" name="email" value="{{$email}}" style="width: 300px;" placeholder="Type your email">
                    @error('email')
                        <span style="color: red">{{$message}}</span>
                    @enderror</p>
                </li>
                <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Password</p><p style="float: left; margin: 0px;"><input type="password" name="password" value="{{$password}}" style="width: 300px;" placeholder="Type your new password">
                    @error('password')
                        <span style="color: red">{{$message}}</span>
                    @enderror</p>
                </li>
                <li class="collection-item"><p style="width: 200px; float: left; margin: 0px;">Confirm Password</p><p style="float: left; margin: 0px;"><input type="password" name="confPassword" style="width: 300px;" placeholder="Type your new password again">
                    @error('confPassword')
                        <span style="color: red">{{$message}}</span>
                    @enderror</p>
                </li>
                <button class="btn waves-effect blue lighten-1" type="submit" name="btnEditProfil" value="1" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 50px; margin-top: 50px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px;">Simpan<i class="material-icons right" style="margin-left: 5px;">save</i></button>
            </ul>
        </form>
    </div>
@endsection

