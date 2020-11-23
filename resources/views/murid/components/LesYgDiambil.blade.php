@extends('mainpage')
@section('content')
    <style>
        .temp-les{
            display: grid;
            grid-template-rows: 75px 170px 95px;
            margin: 50px;
            height: 350px;
            border-radius: 10px;
            background-color: white;
            padding: 10px;
        }
        #daftar-les-container{
            padding: 50px;
        }
    </style>
    <div id="daftar-les-container">
        <h2>Daftar Les yang Diambil</h2>
        @if (count($leslesan)==0)
            <h2>Belum Mengambil Les Apapun</h2>
        @else
            <div class="row">
                @foreach ($leslesan as $item)
                    @if (session("dark") == "true")
                        <div class="col s12 m6 l3 temp-les" style="background-color: #9e9e9e;">
                    @else
                        <div class="col s12 m6 l3 temp-les">
                    @endif
                        <h5 style="margin-bottom: 10px;">{{$item->Nama}}</h5>
                        <div>
                            <p style="font-size: 16px; margin: 5px;">Mata Pelajaran : {{$item->pelajaran->Pelajaran_Nama}}</p>
                            <p style="font-size: 16px; margin: 5px;">Pengajar : {{$item->guru->Guru_Nama}}</p>
                            <p style="font-size: 16px; margin: 5px;">Tingkat : {{$item->tingkatan->Pendidikan_Keterangan}}</p>
                            <p style="font-size: 16px; margin: 5px;">Status :
                            @if ($item->pivot->Pengambilan_Status == 2)
                                Sedang Mengikuti</p>
                            @else
                                @if ($item->pivot->Pengambilan_Status == 0)
                                    Sedang Dikonfirmasi untuk Join</p>
                                @else
                                    Permintaan untuk Join Ditolak</p>
                                @endif
                            @endif
                        </div>
                        <div style="margin-left: auto; margin-right: auto;">
                            @if ($item->pivot->Pengambilan_Status == 2)
                                <button class="btn waves-effect tombol" type="submit" name="btnDetail" value="{{$item->Les_ID}}" style="float: left; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;">Chat<i class="material-icons right" style="margin-left: 5px;">chat</i></button>
                            @endif
                            <form action="/set_session_kelas_diambil" method="get" style="display: inline;">
                                @if (session("dark") == "true")
                                    <button class="btn waves-effect tombol" type="submit" name="btnDetail" value="{{$item->Les_ID}}" style="margin-left: 10px; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                                @else
                                    <button class="btn waves-effect tombol" type="submit" name="btnDetail" value="{{$item->Les_ID}}" style="margin-left: 10px; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #42a5f5;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
