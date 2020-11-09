@extends('murid.home')
@section('content')
    <h1>Daftar Les yang Diambil</h1>
    @if (count($leslesan)==0)
        <h2>Belum Mengambil Les Apapun</h2>
    @else
    <table border="1px">
        <tr>
            <th>Nama</th>
            <th>Nama Pengajar</th>
            <th>Mata Pelajaran</th>
            <th>Tingkat Pendidikan</th>
            <th>Action</th>
        </tr>
        @foreach ($leslesan as $les)
            <tr>
            <td>{{$les->Nama}}</td>
            <td>{{$les->guru->Guru_Nama}}</td>
            <td>{{$les->pelajaran->Pelajaran_Nama}}</td>
            <td>{{$les->tingkatan->Pendidikan_Keterangan}}</td>
            <td>
                <form action="/detail_les_diambil" method="post">
                <button type="submit" name = "btnDetail" value="{{$les->Les_ID}}">Lihat Detail</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    @endif

@endsection
