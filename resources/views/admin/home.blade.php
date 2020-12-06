<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Home</title>


    <style>

    body {
        background-color: #bfe6ff;
    }

    #header{
        /* background-color: #5f9abf; */
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

</head>
<body>
    <div id="header">

        <ul id="navbar">
            <li><a href="/admin/home">Home</a></li>
            <li><a href="/admin/insert/pelajaran" id="about">Insert Pelajaran</a></li>
            <li><a href="/admin/guru/baru">Guru Baru</a></li>
        </ul>

    </div>
    <h1>Admin Home</h1>
    <h4>Belum Tahu Mau Diisi Apa</h4>


</body>
</html>
