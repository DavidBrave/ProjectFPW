<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guru Baru</title>


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

    h2{
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }


        .table-wrapper{
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 2px solid #d6f1ff;
            border-bottom: 1px solid #95bedb;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #426b82;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #95bedb;
            /* background: #F8F8F8; */
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before{
                /* content: "Scroll horizontally >"; */
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }
            .fl-table thead, .fl-table tbody, .fl-table thead th {
                display: block;
            }
            .fl-table thead th:last-child{
                border-bottom: none;
            }
            .fl-table thead {
                float: left;
            }
            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }
            .fl-table td, .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }
            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }
            .fl-table tbody tr {
                display: table-cell;
            }
            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }
            .fl-table tr:nth-child(even) {
                background: transparent;
            }
            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tr td:nth-child(even) {
                background: #95bedb;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }

        button {
            color: whitesmoke;
            border: none;
            border-radius: 10%;
        }

        .button_confirm {
            background: #2fc974;
        }
        .button_reject {
            background: #c0392b;
        }
        .confirmation_text {
            color: #7ccf80;
            text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
        }

        .custom_button {
            width: 200px;
            font-size: 16pt;;
            color: #9fa8b0;
            text-decoration: none;
            font-weight: bold;
            display: block;
            text-shadow: 1px 1px #1f272b;
            border: 1px solid #1c252b;
            border-radius: 3px;
            background: #232B30;
            text-align: center;
            padding: 5px;
        }
        .custom_button:hover {
            color: #fff;
            background: #4C5A64;
        }

        .button_logout {
            width: 100px;
            font-size: 10pt;
            color: whitesmoke;
            text-decoration: none;
            background-color: #c21313;
            font-weight: bold;
            display: block;
            text-shadow: 1px 1px #1f272b;
            border: 1px solid #1c252b;
            border-radius: 3px;
            text-align: center;
            padding: 5px;
        }
        .button_logout:hover {
            background: #e33b3b;
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

    <br><br><br>

    <div class="table-wrapper">
        <table class="fl-table">
        <thead>
            <tr>

                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th colspan="3">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($guru_baru as $guru)

                <tr>
                    <td>{{ $guru->Guru_Username}}</td>
                    <td>{{ $guru->Guru_Nama}}</td>
                    <td>{{ $guru->Guru_Email }}</td>
                    <td>{{ $guru->Guru_Alamat }}</td>
                    <td>
                        <form action="/admin/guru/baru" method="post">
                            @csrf
                            <input type="hidden" name="guru_id" value="{{$guru->Guru_ID}}">
                            <input type="hidden" name="type" value="detail">
                            <Button style="color: black">Detail</Button>

                        </form>
                    </td>

                    <td>
                        <form action="/admin/guru/baru" method="post">
                            @csrf
                            <input type="hidden" name="guru_id" value="{{$guru->Guru_ID}}">
                            <input type="hidden" name="type" value="accept">
                            <Button class="button_confirm">Terima</Button>

                        </form>
                    </td>

                    <td>
                        <form action="/admin/guru/baru" method="post">
                            @csrf
                            <input type="hidden" name="guru_id" value="{{$guru->Guru_ID}}">
                            <input type="hidden" name="type" value="reject">
                            <Button class="button_reject">Tolak</Button>

                        </form>
                    </td>

                </tr>

            @endforeach
        </tbody>
        </table>
    </div>



</body>
</html>
