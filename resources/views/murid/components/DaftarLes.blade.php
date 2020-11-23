@extends('mainpage')
@section('content')
    <style>
        .temp-les{
            display: grid;
            grid-template-rows: 75px 150px 75px;
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
    {{-- <br><br><br><br> --}}
    {{-- <h1>Welcome , {{$murid->Murid_Username}}</h1> --}}
    <div id="daftar-les-container">
        <h2>Daftar Kelas</h2>
        <div class="row">
        @foreach ($les as $item)
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
                    <p style="font-size: 16px; margin: 5px;">Sisa slot : {{$item->Sisa_Slot}} dari {{$item->Slot}}</p>
                </div>
                <form action="/set_session_kelas" method="get">
                    @if (session("dark") == "true")
                        <button class="btn waves-effect tombol" type="submit" name="btnDetail" value="{{$item->Les_ID}}" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                    @else
                        <button class="btn waves-effect tombol" type="submit" name="btnDetail" value="{{$item->Les_ID}}" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #42a5f5;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                    @endif
                </form>
            </div>
        @endforeach
        </div>
    </div>
@endsection
