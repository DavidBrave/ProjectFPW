@extends('murid.home')
@section('content')

<h1>Detail Les</h1>
    <br>
    <h2>{{$les->Nama}}</h2>
    Diajar Oleh {{$les->guru->Guru_Nama}} <br>
    @if ($les->Jum_Orang_Rating == 0)
        Belum dirating
    @else
        Rating : {{$les->Rating}} dari 5 dari {{$les->Jum_Orang_Rating}} Suara
    @endif
    <table>
        <tr>
            <td>Mata Pelajaran yang diajarkan</td>
            <td>: {{$les->pelajaran->Pelajaran_Nama}}</td>
        </tr>
        <tr>
            <td>Tingkat Pendidikan</td>
            <td>: {{$les->tingkatan->Pendidikan_Keterangan}}</td>
        </tr>
        <tr>
            <td>Sisa slot </td>
            <td>: {{$les->Sisa_Slot}} dari {{$les->Slot}}</td>
        </tr>
    </table>
    Deskripsi : <br>
    {{$les->Deskripsi}}
    <form action="/keluar_les" method="post">
        <button type="submit">Batal Les</button>
    </form>
@endsection
