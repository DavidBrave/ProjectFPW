@extends('mainpage')
@section('content')
    <style>
        #container{
            display: grid;
            grid-template-rows: 120px 700px 100px;
        }
        #login-container{
            background-color:white;
            width: 400px;
            height: 450px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            padding: 25px;
            padding-top: 0px;
            border-radius: 10px;
        }
        h2{
            text-align: center;
        }
        #login{
            color: #ff8282;
        }
        .btnLogin{
            width: 200px;
            margin-left: 75px;
        }
    </style>
    @if (session("message"))
        <style>
            #toast-container {
                top: 10%;
                left: 35%;
                width: 590px;
            }
        </style>
        <script>Materialize.toast("{{session("message")}}", 2000, 'rounded')</script>
    @endif
    <div id="login-container">
        <h2>Login</h2><br>
        <form action="/melakukanlogin" method="post">
            @csrf
            Username: <input type="text" name="username" placeholder="Type your username"><br>
            Password: <input type="password" name="password" id="password" placeholder="Type your password">
            <div style="float: left;">
                <input type="checkbox" id="hide_pass" onclick="TogglePassword()">
                <label for="hide_pass"><b id="text_showHide">Show Password</b></label>
            </div><br><br><br>
            @if (session("pesan"))
                <div style="color:red"> {{session("pesan")}}</div><br>
            @endif
            <button class="btn waves-effect blue lighten-1 btnLogin" type="submit" name="action">Login</button>
        </form>
    </div>
    <script>
        function TogglePassword() {
            var input_password = document.getElementById("password");
            if (input_password.type === "password") {
                input_password.type = "text";
                document.getElementById("text_showHide").innerHTML = "Hide Password";
            }
            else {
                input_password.type = "password";
                document.getElementById("text_showHide").innerHTML = "Show Password";
            }
        }
    </script>
@endsection
