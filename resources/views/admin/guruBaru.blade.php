@extends('mainpage')
@section('content')
<style>
    #temp-dld{
        position: relative;
        background-color: white;
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto;
        width: 800px;
        padding: 20px 40px 40px 40px;
        margin-top: 50px;
    }
    .fixed-action-btn{
        position: absolute;
    }
    #photo-profile{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    #pp{
        position: absolute;
        top: -10px;
        right: 0px;
    }
    .table-wrapper{
            margin: 10px 200px 70px;
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
        }


        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before{
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
        #container-tabel{
            overflow-y: scroll;
            min-height: 450px;
            max-height: 450px;
            margin-top: 20px;
        }
</style>
@if (session("message")!=null)
    <script>alert("{{session('message')}}");</script>
@endif
<script>
</script>
<div id="dld-container">
    <div id="temp-dld">
        <h3 style="text-align: center;" id="txtPersonal">Terima Guru Baru</h3><br>
        <div id="container-tabel">
            <table class="responsive-table striped">
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
    </div>
</div>
@endsection
