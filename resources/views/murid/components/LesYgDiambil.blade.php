@extends('mainpage')
@section('content')
    <h1>Daftar Les yang Diambil</h1>
    @if (count($leslesan)==0)
        <h2>Belum Mengambil Les Apapun</h2>
    @else
    <table>
        @foreach ($leslesan as $les)
            <tr>
            <td><h2>{{$les->Nama}}</h2></td>
            </tr>
            <tr>
            <td>Nama Guru Les</td>
            <td>: {{$les->guru->Guru_Nama}}</td>
            </tr>
            <tr>
            <td>Nama Pelajaran</td>
            <td>: {{$les->pelajaran->Pelajaran_Nama}}</td>
            </tr>
            <tr>
                <td>Status</td>
                @if ($les->pivot->Pengambilan_Status != 2)
                    <td>: Sedang Mengikuti</td>
                @else
                    @if ($les->pivot->Pengambilan_Status == 0)
                        <td>: Sedang Dikonfirmasi untuk Join</td>
                    @else
                        <td>: Permintaan untuk Join Ditolak</td>
                    @endif
                @endif
            </tr>
            <tr>
            <td>
                {{-- @if ($item->Status == 2) --}}
                @if ($les->pivot->Pengambilan_Status == 2)
                    <button type="submit" name = "btnDetail" value="{{$les->Les_ID}}">Chat</button>
                @endif
            </td>
            <td>
                <form action="/set_session_kelas_diambil" method="get">
                    <button type="submit" name = "btnDetail" value="{{$les->Les_ID}}">Lihat Detail</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    @endif

@endsection
