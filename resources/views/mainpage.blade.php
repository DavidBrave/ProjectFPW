<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Course</title>
    <script src="{{asset("jquery-3.4.1.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("materialize/css/materialize.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
    .checked {
        color: orange;
    }
    body{
        background-color: #bfe6ff;
    }
    #container{
        display: grid;
        grid-template-rows: 120px auto 100px;
        background-color: #bfe6ff;
        min-height: 937px;
        height: auto;
    }
    #menu{
        position: fixed;
        top: 120px;
        right: 0px;
        background-color: white;
        width: 200px;
        border-radius: 10px;
        margin: 10px;
    }
    .menu-item{
        display: block;
        color: black;
        padding: 10px;
    }
    .menu-item:hover{
        background-color: rgb(223, 221, 221);
    }
    .menu-item.top:hover{
        background-color: rgb(223, 221, 221);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .menu-item.bottom:hover{
        background-color: rgb(223, 221, 221);
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    #mode{
        position: fixed;
        bottom: 10px;
        right: 10px;
    }
    .switch label input[type=checkbox]:checked+.lever:after {
        background-color: #0d47a1;
    }
    .menu-item-kelas{
        background-color: rgb(180, 177, 177);
        display: block;
        color: black;
        padding: 10px;
        font-size: 17px;
    }
    .menu-item-kelas:hover{
        background-color: white;
    }
    #toast-container {
        top: 90%;
        right: 50%;
    }
    span.character-counter{
        display: none;
    }
    .dropdown-content li>a, .dropdown-content li>span{
        color: black;
    }
    .input-field input[type=text]:focus + label, .input-field input[type=number]:focus + label, .materialize-textarea:focus:not([readonly]) + label {
        color: #0d47a1 !important;
    }
    .input-field input[type=text]:focus, .input-field input[type=number]:focus, .materialize-textarea:focus:not([readonly]) {
        border-bottom: 1px solid #0d47a1 !important;
        box-shadow: 0 1px 0 0 #0d47a1 !important;
    }
</style>
<script>
    $(document).ready(function () {
        $('.scrollspy').scrollSpy();

        $('.fixed-action-btn').floatingActionButton({
            direction : 'left'
        });

        $('.timepicker').timepicker({
            twelveHour : false
        });

        $('select').formSelect();

        $('.slider').slider({
            interval : 3000
        });

        $('.materialboxed').materialbox();

        $('.carousel.carousel-slider').carousel();

        $(".account").click(function () {
            $("#menu").toggle();
            $("#menu-kelas").hide();
        });

        $("#darkmode").change(function () {
            if($(this).is(":checked")) {
                $.ajax({
                    url : "/changemode",
                    data : {
                        dark : "true"
                    }
                });
                $("body").css("background-color", "#424242");
                $("#header").css("background-color", "rgb(43, 40, 40)");
                $("#container").css("background-color", "#424242");
                $(".account").css("background-color", "#616161");
                $("#footer").css("background-color", "#424242");
                $("#footer").css("color", "white");
                $("#home-container").css("background-color", "#9e9e9e");
                $("#about-container").css("background-color", "#9e9e9e");
                $("#about-container").css("color", "white");
                $("#txtPersonal").css("color", "white");
                $(".temp-les").css("background-color", "#9e9e9e");
                $(".tombol").css("background-color", "#616161");
                $(".send").css("color", "#616161");

                Materialize.toast('Dark Mode', 2000, 'rounded');
            }
            else {
                $.ajax({
                    url : "/changemode",
                    data : {
                        dark : "false"
                    }
                });
                $("body").css("background-color", "#bfe6ff");
                $("#header").css("background-color", "#5f9abf");
                $("#container").css("background-color", "#bfe6ff");
                $(".account").css("background-color", "#8fc2e2");
                $("#footer").css("background-color", "#bfe6ff");
                $("#footer").css("color", "#1f333f");
                $("#home-container").css("background-color", "white");
                $("#about-container").css("background-color", "white");
                $("#about-container").css("color", "black");
                $("#txtPersonal").css("color", "black");
                $(".temp-les").css("background-color", "white");
                $(".tombol").css("background-color", "#42a5f5");
                $(".send").css("color", "#42a5f5");

                Materialize.toast('Normal Mode', 2000, 'rounded');
            }
        });

        $("#kelas").click(function () {
           $("#menu-kelas").toggle();
        });
    });
</script>
@if (session("dark") == "true")
    <body style="background-color: #424242;">
@else
    <body>
@endif
    @if (session("dark") == "true")
        <div id="container" style="background-color: #424242;">
    @else
        <div id="container">
    @endif
    {{-- @if (!session("muridLogin") && !session("guruLogin"))
        @include('includes.headerNonUser')
    @endif --}}
        @include('includes.header')
        @if (session("muridLogin"))
        {{-- @include('includes.headerMurid') --}}
            <div id="menu" style="height: 200px;" hidden>
                <a href="/murid_profil" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">account_box</i><p style="margin: 0px 0px 0px 35px; width: auto;">Profile saya</p></a>
                <a href="/kelas_yg_diambil" class="waves-effect menu-item"><i class="material-icons" style="position: absolute; font-size: 30px;">school</i><p style="margin: 0px 0px 0px 35px; width: auto;">Kelas Saya</p></a>
                <a href="/all_chat" class="waves-effect menu-item"><i class="material-icons" style="position: absolute; font-size: 30px;">chat</i><p style="margin: 0px 0px 0px 35px; width: auto;">Chat</p></a>
                <a href="/logout" class="waves-effect menu-item bottom"><i class="material-icons" style="position: absolute; font-size: 30px;">exit_to_app</i><p style="margin: 0px 0px 0px 35px; width: auto;">Log Out</p></a>
            </div>
        @endif
        @if (session("guruLogin"))
            <div id="menu" hidden>
                <a href="/guru/profile" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">account_box</i><p style="margin: 0px 0px 0px 35px; width: auto;">Profile saya</p></a>
                <a href="/guru/edit_profile" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">edit</i><p style="margin: 0px 0px 0px 35px; width: auto;">Edit profile</p></a>
                <a href="javascript:void(0)" class="waves-effect menu-item" id="kelas"><i class="material-icons" style="position: absolute; font-size: 30px;">school</i><p style="margin: 0px 0px 0px 35px; width: auto;">Kelas</p></a>
                <div id="menu-kelas" hidden>
                    <a href="/guru/kelas" class="waves-effect menu-item-kelas"><i class="material-icons" style="position: absolute; font-size: 20px;">school</i><p style="margin: 0px 0px 0px 35px; width: auto;">Kelas</p></a>
                    <a href="/guru/create_class" class="waves-effect menu-item-kelas"><i class="material-icons" style="position: absolute; font-size: 20px;">create</i><p style="margin: 0px 0px 0px 35px; width: auto;">Buat kelas</p></a>
                    <a href="/guru/terima_tolak_murid" class="waves-effect menu-item-kelas"><i class="material-icons" style="position: absolute; font-size: 20px;">people</i><p style="margin: 0px 0px 0px 35px; width: auto;">Terima/Tolak Murid</p></a>
                    <a href="/guru/tutup_kelas" class="waves-effect menu-item-kelas"><i class="material-icons" style="position: absolute; font-size: 20px;">close</i><p style="margin: 0px 0px 0px 35px; width: auto;">Tutup kelas</p></a>
                    <a href="/guru/history" class="waves-effect menu-item-kelas"><i class="material-icons" style="position: absolute; font-size: 20px;">history</i><p style="margin: 0px 0px 0px 35px; width: auto;">History</p></a>
                </div>
                <a href="/all_chat" class="waves-effect menu-item"><i class="material-icons" style="position: absolute; font-size: 30px;">chat</i><p style="margin: 0px 0px 0px 35px; width: auto;">Chat</p></a>
                <a href="/logout" class="waves-effect menu-item bottom"><i class="material-icons" style="position: absolute; font-size: 30px;">exit_to_app</i><p style="margin: 0px 0px 0px 35px; width: auto;">Keluar</p></a>
            </div>
        @endif
        @if (session("adminLogin"))
            <div id="menu" hidden>
                {{-- MENU ITEM ADMIN --}}

                <a href="/admin/profile" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">account_box</i><p style="margin: 0px 0px 0px 35px; width: auto;">Profile saya</p></a>

                <a href="/admin/insert/admin" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">person_add</i><p style="margin: 0px 0px 0px 35px; width: auto;">Tambah Admin</p></a>

                <a href="/admin/insert/pelajaran" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">edit</i><p style="margin: 0px 0px 0px 35px; width: auto;">Insert Pelajaran</p></a>

                <a href="/admin/guru/baru" class="waves-effect menu-item top"><i class="material-icons" style="position: absolute; font-size: 30px;">school</i><p style="margin: 0px 0px 0px 35px; width: auto;">Terima Guru</p></a>

                <a href="/logout" class="waves-effect menu-item bottom"><i class="material-icons" style="position: absolute; font-size: 30px;">exit_to_app</i><p style="margin: 0px 0px 0px 35px; width: auto;">Keluar</p></a>
            </div>
        @endif
        <div class="switch" id="mode">
            <label>
              Off
              @if (session("dark") == "true")
                <input type="checkbox" id="darkmode" checked>
              @else
                <input type="checkbox" id="darkmode">
              @endif
              <span class="lever" style="background-color: #6fa0eb;"></span>
              On
            </label>
        </div>
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
