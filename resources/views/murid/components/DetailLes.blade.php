@extends('mainpage')
@section('content')

    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <h1>Detail Les</h1>
    <br>
    <h2>{{$les->Nama}}</h2>
    Diajar Oleh {{$les->guru->Guru_Nama}} <br>
    Email Guru : {{$les->guru->Guru_Email}}
    <br>
    @if ($les->Jum_Orang_Rating == 0)
        Belum dirating
    @else
        Rating : {{$les->Rating}} dari 5 dari {{$les->Jum_Orang_Rating}} Suara
    @endif
    @if ($lesDiambil==null)
        <form action="/murid_ambil_kelas" method="get">
            <button type="submit"
            onclick="return confirm('Apakah anda akan mengajukan permintaan untuk join di les ini?')"
            >Ajukan Pengambilan</button>
        </form>
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

@endsection
