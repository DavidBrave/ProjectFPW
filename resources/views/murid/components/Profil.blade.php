@extends('murid.home')
@section('content')
    <h1>Profil</h1>
    <form action="/murid_edit_profil" method="get">
        <button name="btnEditProfil" value="1">Edit Profil</button>
    </form>
    <table>
        <tr>
            <td>Username</td>
            <td>: {{$murid->Murid_Username}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: {{$murid->Murid_Nama}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{$murid->Murid_Email}}</td>
        </tr>
        <tr>
            <td>Tingkat Pendidikan</td>
            <td>: {{$murid->tingkatan->Pendidikan_Keterangan}}</td>
        </tr>
    </table>
@endsection
