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
    <br>
    @if ($les->pivot->Pengambilan_Status != 2 )
        Status :
        @if ($les->pivot->Pengambilan_Status == 0)
            Permintaan join les belum dikonfirmasi
        @else
            Permintaan join les ditolak
        @endif
        <form action="/murid_batal_ajukan_join_les" method="get">
            <button type="submit"
            onclick="return confirm('Apakah anda yakin akan membatalkan permintaan untuk join di les ini?')"
            >Membatalkan permintaan untuk join les</button>
        </form>
    @else
        Status : Sedang Mengikuti
        <form action="/murid_rating_kelas" method="get">
            <button type="submit"
            onclick="return confirm('Apakah anda yakin akan keluar dari les ini?')"
            >Keluar Les</button>
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
