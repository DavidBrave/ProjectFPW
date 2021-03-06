<style>
    #header{
        background-color: #5f9abf;
        padding: 10px;
        position: sticky;
        top: 0px;
        z-index: 999;
    }
    #logo{
        float: left;
        width: 80px;
        height: 80px;
        margin-left: 20px;
        margin-right: 10px;
        margin-top: 10px;
    }
    #course_name{
        float: left;
        font-size: 40px;
        color: white;
        margin: 10px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        margin-top: 15px;
    }
    #navbar{
        float: right;
        padding-top: 5px;
    }
    #navbar li{
        display: inline;
        line-height: 50px;
        margin: 20px;
    }
    a{
        text-decoration: none;
        font-size: 20px;
        color: white;
    }
    li a:hover{
        color: #1f333f;
    }
    .account{
        float: right;
        margin-top: 20px;
        margin-right: 10px;
        border-radius: 30px;
        width: auto;
        height: 50px;
        padding: 5px;
        background-color: #8fc2e2;
    }
    .txt-name{
        float: right;
        font-size: 20px;
        margin: 10px;
        margin-top: 5px;
    }
</style>
@if (session("dark") == "false" || session("dark") == null)
    <div id="header">
@else
    <div id="header" style="background-color: rgb(43, 40, 40)">
@endif
    <img src="{{asset("Images/logo.png")}}" alt="" id="logo">
    <img src="{{asset("Images/name.png")}}" alt="" style="margin-top: 17px;">
    @if (session("muridLogin"))
        <a href="javascript:void(0)">
            @if (session("dark") == "false" || session("dark") == null)
                <div class="account">
            @else
                <div class="account" style="background-color: #616161;">
            @endif
                @if (session("muridLogin")->Murid_Photo)
                    <img src="{{asset("storage/Photos/".session('muridLogin')->Murid_Photo)}}" alt="" style="width: 40px; height: 40px; float: right; border-radius: 50%;">
                @else
                    <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                @endif
                <i class="material-icons" style="line-height: 40px;">expand_more</i>
                <p class="txt-name">{{session("muridLogin")->Murid_Nama}}</p>
            </div>
        </a>
    @endif

    @if (session("guruLogin"))
        <a href="javascript:void(0)">
            @if (session("dark") == "false" || session("dark") == null)
                <div class="account">
            @else
                <div class="account" style="background-color: #616161;">
            @endif
                @if (session("guruLogin")->Guru_Photo)
                    <img src="{{asset("storage/Photos/".session('guruLogin')->Guru_Photo)}}" alt="" style="width: 40px; height: 40px; float: right; border-radius: 50%;">
                @else
                    <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                @endif
                <i class="material-icons" style="line-height: 40px;">expand_more</i>
                <p class="txt-name">{{session("guruLogin")->Guru_Nama}}</p>
            </div>
        </a>
    @endif

    @if (session("adminLogin"))
        <a href="javascript:void(0)">
            @if (session("dark") == "false" || session("dark") == null)
                <div class="account">
            @else
                <div class="account" style="background-color: #616161;">
            @endif
                <img src="{{asset("Images/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                <i class="material-icons" style="line-height: 40px;">expand_more</i>
                <p class="txt-name">{{session("adminLogin")->Admin_Nama}}</p>
            </div>
        </a>
    @endif

    @if (session("adminLogin") || session("muridLogin") || session("guruLogin"))
        <ul id="navbar">
            <li><a href="/">Home</a></li>
            <li><a href="/about" id="about">About Smart Course</a></li>
            @if (session("muridLogin"))
                <li><a href="/daftar_kelas">Course</a></li>
            @else
                <li><a href="/courses">Course</a></li>
            @endif
        </ul>
    @else
        <ul id="navbar">
            <li><a href="/" id="home">Home</a></li>
            <li><a href="/about" id="about">About Smart Course</a></li>
            <li><a href="/courses" id="courses">Courses</a></li>
            <li><a href="/login" id="login">Login</a></li>
            <li><a href="/register" id="register">Register</a></li>
        </ul>
    @endif

    {{-- <ul id="navbar">
        @yield('menu_bar')
    </ul> --}}

</div>
