<style>
    #header{
        background-color: #5f9abf;
        padding: 10px;
        position: sticky;
        top: 0px;
    }
    #logo{
        float: left;
        width: 100px;
        height: 100px;
        margin-right: 10px;
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
        border: 1px solid #8fc2e2;
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
<div id="header">
    <img src="{{asset("Images/logo.png")}}" alt="" id="logo">
    <p id="course_name">Smart Course</p>
    @if (session("muridLogin"))
        <a href="">
            <div class="account" id="murid">
                <img src="{{asset("Images/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                <p class="txt-name">{{session("muridLogin")[0]->Murid_Nama}}</p>
            </div>
        </a>
    @endif

    @if (session("guruLogin"))
        <a href="">
            <div class="account" id="guru">
                <img src="{{asset("Images/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                <p class="txt-name">{{session("guruLogin")[0]->Guru_Nama}}</p>
            </div>
        </a>
    @endif

    @if (session("adminLogin"))
        <a href="">
            <div class="account" id="admin">
                <img src="{{asset("Images/nophoto.png")}}" alt="" style="width: 40px; height: 40px; float: right;">
                <p class="txt-name">{{session("adminLogin")[0]->Admin_Nama}}</p>
            </div>
        </a>
    @endif

    <ul id="navbar">
        <li><a href="/" id="home">Home</a></li>
        <li><a href="/about" id="about">About Smart Course</a></li>
        <li><a href="/courses" id="courses">Courses</a></li>
        @if (session("muridLogin") || session("guruLogin") || session("adminLogin"))

        @else
            <li><a href="/login" id="login">Login</a></li>
            <li><a href="/register" id="register">Register</a></li>
        @endif
    </ul>

</div>
