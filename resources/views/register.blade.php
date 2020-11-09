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
            <form action="#" method="post">
                @csrf
                Username: <input type="text" name="username" placeholder="Type your username"><br>
                Name: <input type="text" name="name" placeholder="Type your name"><br>
                Email: <input type="text" name="email" placeholder="Type your email"><br>
                Password: <input type="password" name="password" placeholder="Type your password"><br>
                Confirm Password: <input type="password" name="confirm" placeholder="Type your password again"><br><br>
                <button class="btn waves-effect blue lighten-1 btnRegister" type="submit" name="action">Register</button>
            </form>
        </div>
        <div id="form-pengajar" hidden>
            <form action="#" method="post">
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