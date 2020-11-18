@extends('mainpage')
@section('content')
    <style>
        #about-container{
            background-color: white;
            width: 700px;
            margin-left: auto;
            margin-right: auto;
            padding: 25px;
        }
        #about{
            color: #ff8282;
        }
        li{
            font-size: 20px;
            margin: 10px;
        }
        h3{
            margin-bottom: 50px;
            color: #14d9b5;
            font-weight: bold;
        }
    </style>
    @if (session("dark") == "false" || session("dark") == null)
        <div id="about-container">
    @else
        <div id="about-container" style="background-color: #9e9e9e; color: white;">
    @endif
        <h3>About Smart Course</h3>
        <ol>
            <li><b>Smart Course</b> Course merupakan kursus online yang baru dibuat pada tahun 2020.</li>
            <li><b>Smart Course</b> menyediakan banyak kelas yang dari berbagai jenjang pendidikan.</li>
            <li><b>Smart Course</b> memiliki pengajar professional yang sudah berpengalaman mengajar.</li>
            <li><b>Smart Course</b> memiliki kategori kelas umum, kelompok, dan private.</li>
            <li><b>Smart Course</b> merupakan tempat belajar terbaik untuk membantu dalam meningkatkan nilai akademis dan membantu untuk masuk ke jenjang yang lebih tinggi.</li>
            <li><b>Smart Course</b> menyediakan beasiswa bagi pelajar yang berprestasi di sekolah.</li>
        </ol>
    </div>
@endsection
