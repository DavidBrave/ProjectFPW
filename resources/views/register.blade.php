@extends('mainpage')
@section('content')
    <style>
        #container{
            display: grid;
            grid-template-rows: 120px auto 100px;
        }
        #register-container{
            background-color:white;
            width: 500px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            padding: 25px;
            padding-top: 0px;
            border-radius: 10px;
        }
        #register{
            color: #ff8282;
        }
        #register-navbar{
            display: grid;
            grid-template-columns: 50% 50%;
            margin-top: 50px;
        }
        #pelajar, #pengajar{
            text-align: center;
        }
        #pelajar, #pengajar:hover{
            color: #2979ff;
        }
        #form-pelajar{
            width: 400px;
        }
        #form-pengajar{
            width: 400px;
        }
        h2{
            text-align: center;
        }
        .btnRegister{
            width: 200px;
            margin-left: 125px;
        }
        #pelajar{
            color: #ff8282;
        }
        #kotak{
            height: 100px;
            width: 100px;
            margin-bottom: 10px;
            background-size: 80px;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url("Images/nophoto.png");
            background-color: gray;
        }
        #kotak2{
            height: 100px;
            width: 100px;
            margin-bottom: 10px;
            background-size: 80px;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url("Images/nophoto.png");
            background-color: gray;
        }
        #pengajar:hover{
            color: black;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#pengajar").click(function () {
                $("#pengajar").css("color", " #ff8282");
                $("#pelajar").css("color", " black");
                $("#form-pengajar").toggle();
                $("#form-pelajar").hide();
            });

            $("#pelajar").click(function () {
                $("#pelajar").css("color", " #ff8282");
                $("#pengajar").css("color", " black");
                $("#form-pelajar").toggle();
                $("#form-pengajar").hide();
            });

            $("#imgfile").change(function () {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("imgfile").files[0]);

                oFReader.onload = function (oFREvent) {
                    $("#kotak").css("background-image", "url('" + oFREvent.target.result + "')");
                    $("#kotak").css("background-size", "cover");
                };
            });

            $("#imgfile2").change(function () {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("imgfile2").files[0]);

                oFReader.onload = function (oFREvent) {
                    $("#kotak2").css("background-image", "url('" + oFREvent.target.result + "')");
                    $("#kotak2").css("background-size", "cover");
                };
            });
        });
    </script>
    <div id="register-container">
        <h2>Register</h2>
        <div id="register-navbar">
            <a href="javascript:void(0)"><h5 id="pelajar">Pelajar</h5></a>
            <a href="javascript:void(0)" style="color: black;"><h5 id="pengajar">Pengajar</h5></a>
        </div>
        <hr>
        <br><br>
        <div id="form-pelajar">
            <form action="/registerpelajar" method="post" enctype="multipart/form-data">
                @csrf
                <div id="kotak"></div>
                Photo: <br><br>
                <input type="file" name="file" id="file"><br><br>
                @error('file')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Username: <input type="text" name="username" placeholder="Type your username"><br>
                @error('username')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Name: <input type="text" name="name" placeholder="Type your name"><br>
                @error('name')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Email: <input type="text" name="email" placeholder="Type your email"><br>
                @error('email')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Password: <input type="password" name="password" placeholder="Type your password"><br>
                @error('password')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Confirm Password: <input type="password" name="confirm" placeholder="Type your password again"><br><br>

                @error('confirm')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror

                Tingkatan:
                <div class="input-field col s12">
                    <select name="tingkat">
                        <option value="none" disabled selected>Choose your option</option>
                        @isset($tingkat)
                            @foreach ($tingkat as $item)
                                <option value="{{$item->Pendidikan_ID}}">{{$item->Pendidikan_Keterangan}}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <button class="btn waves-effect blue lighten-1 btnRegister" type="submit" name="action">Register</button>
            </form>
        </div>
        <div id="form-pengajar" hidden>
            <form action="/registerguru" method="post" enctype="multipart/form-data">
                @csrf
                <div id="kotak2"></div>
                Photo: <br><br>
                <input type="file" name="file" id="file2"><br><br>
                @error('file')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Username: <input type="text" name="username" placeholder="Type your username"><br>
                @error('username')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Name: <input type="text" name="name" placeholder="Type your name"><br>
                @error('name')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Email: <input type="text" name="email" placeholder="Type your email"><br>
                @error('email')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Alamat: <input type="text" name="address" placeholder="Type your address"><br>
                @error('address')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Sertifikat: <br><br>
                <input required type="file" name="myfile[]" id="" multiple ><br><br>
                Password: <input type="password" name="password" placeholder="Type your password"><br>
                @error('password')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                Confirm Password: <input type="password" name="confirm" placeholder="Type your password again"><br><br>
                @error('confirm')
                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                @enderror
                <button class="btn waves-effect blue lighten-1 btnRegister" type="submit" name="action">Register</button>
            </form>
        </div>
    </div>
@endsection
