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
</style>
<div id="header">
    <img src="{{asset("Photos/logo.png")}}" alt="" id="logo">
    <p id="course_name">Smart Course</p>
    <ul id="navbar">
        <li><a href="/" id="home">Home</a></li>
        <li><a href="/about" id="about">About Smart Course</a></li>
        <li><a href="/courses" id="courses">Courses</a></li>
        <li><a href="/login" id="login">Login</a></li>
        <li><a href="/register" id="register">Register</a></li>
    </ul>
    <div id="account" hidden>

    </div>
</div>
