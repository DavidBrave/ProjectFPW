@extends('mainpage')
@section('content')
    <style>
        #temp-dld{
            position: relative;
            background-color: white;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 800px;
            padding: 20px 40px 40px 40px;
            margin-top: 50px;
        }
        .fixed-action-btn{
            position: absolute;
        }
        #photo-profile{
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        #pp{
            position: absolute;
            top: -10px;
            right: 0px;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <script>
        $(document).ready(function () {
            $("#imgfile").change(function () {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("imgfile").files[0]);

                oFReader.onload = function (oFREvent) {
                    $("#photo-profile").css("background-image", "url('" + oFREvent.target.result + "')");
                    $("#photo-profile").css("background-size", "cover");
                };
            });
        });
    </script>
    <div id="dld-container">
        <div id="temp-dld">
            <h4>Edit Profile</h4><br>
            <form action="/edit" method="post">
                @csrf
                @if ($guru->Guru_Photo)
                    <div id="photo-profile" style="background-image: url('{{asset("storage/Photos/".$guru->Guru_Photo)}}'); position: relative;">
                @else
                    <div id="photo-profile" style="background-image: url('{{asset("storage/Photos/nophoto.png")}}')">
                @endif
                    <div class="file-field input-field" id="pp">
                    @if (session("dark") == "true")
                        <div class="btn-floating waves-effect waves-light tombol" style="background-color: #616161;">
                    @else
                        <div class="btn-floating waves-effect waves-light tombol" style="background-color: #42a5f5;">
                    @endif
                            <input type="file" name="imgfile" id="imgfile">
                            <i class="material-icons">add</i>
                        </div>
                    </div>
                </div>
                <br><br><br>
                Nama : <input type="text" name="name" value="{{$guru->Guru_Nama}}" placeholder="Type your name"><br>
                Username : <input type="text" name="username" value="{{$guru->Guru_Username}}" placeholder="Type your username"><br>
                Email : <input type="text" name="email" value="{{$guru->Guru_Email}}" placeholder="Type your email"><br>
                Alamat : <input type="text" name="alamat" value="{{$guru->Guru_Alamat}}" placeholder="Type your address"><br>
                Password Baru : <input type="password" name="password" placeholder="Type your password"><br>
                Confirm password : <input type="text" name="confirm" placeholder="Type your password again"><br>
                @if (session("dark") == "true")
                    <button class="btn waves-effect tombol" type="submit" style="background-color: #616161;">Update<i class="material-icons right">edit</i></button>
                @else
                    <button class="btn waves-effect tombol" type="submit" style="background-color: #42a5f5;">Update<i class="material-icons right">edit</i></button>
                @endif
            </form>
        </div>
    </div>
@endsection
