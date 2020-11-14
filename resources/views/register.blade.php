@extends('mainpage')
@section('content')
    <style>
        #container{
            display: grid;
            grid-template-rows: 120px 950px 100px;
        }
        #register-container{
            background-color:white;
            width: 500px;
            height: 950px;
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
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css%22%3E">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js%22%3E"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js%22%3E"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();

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


        });
    </script>
    <div id="register-container">
        <h2>Register</h2>
        <div id="register-navbar">
            <h5 id="pelajar">Pelajar</h5>
            <h5 id="pengajar">Pengajar</h5>
        </div>
        <hr>
        <br><br>
        <div id="form-pelajar">
            <form action="/registerpelajar" method="post">
                @csrf
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
                <div class="input-field col s12">
                    Tingkatan:
                    <select name="tingkat">
                        <option value="" disabled selected>Choose your option</option>
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
            <form action="/registerguru" method="post">
                @csrf
                Username: <input type="text" name="username" placeholder="Type your username"><br>
                Name: <input type="text" name="name" placeholder="Type your name"><br>
                Email: <input type="text" name="email" placeholder="Type your email"><br>
                Alamat: <input type="text" name="address" placeholder="Type your address"><br>
                Sertifikat: <br><br>
                <input type="file" name="myfile" id=""><br><br>
                Password: <input type="password" name="password" placeholder="Type your password"><br>
                Confirm Password: <input type="password" name="confirm" placeholder="Type your password again"><br><br>
                <button class="btn waves-effect blue lighten-1 btnRegister" type="submit" name="action">Register</button>
            </form>
        </div>
    </div>
@endsection
