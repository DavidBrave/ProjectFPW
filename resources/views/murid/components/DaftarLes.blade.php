@extends('mainpage')
@section('content')
    <br><br><br><br>
    {{-- <h1>Welcome , {{$murid->Murid_Username}}</h1> --}}
    <h2>Daftar Kelas</h2>
    <hr>
        @foreach ($les as $item)
            <h3>{{$item->Nama}}</h3>
            Diajar oleh {{$item->guru->Guru_Nama}}
            <table>
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>: {{$item->pelajaran->Pelajaran_Nama}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tingkat</td>
                    <td>: {{$item->tingkatan->Pendidikan_Keterangan}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sisa slot </td>
                    <td>: {{$item->Sisa_Slot}} dari {{$item->Slot}}</td>
                    <td>
                        <form action="/set_session_kelas" method="get">
                            <button type="submit"
                            value="{{$item->Les_ID}}" name="btnDetail"> Lihat Detail</button>
                        </form>
                    </td>
                </tr>
            </table>
            <hr>
        @endforeach
    </table>
@endsection
