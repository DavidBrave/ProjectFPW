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
            padding: 30px 50px 50px 50px;
        }
        #courses{
            color: #ff8282;
        }
    </style>
    {{-- <br><br><br><br> --}}
    {{-- <h1>Welcome , {{$murid->Murid_Username}}</h1> --}}
    <div id="daftar-les-container">
        <h2>Daftar Kelas</h2><br><br>
        <form action="/courses" method="get">
            <div style="width: 30%;">
                <input type="text" style="background-color: white; margin-right: 30px; height: 30px; padding-left: 5px; border-radius: 5px;" name="name" id="" placeholder="Cari berdasarkan nama les,nama guru">
                <br>
                <select name="tingkatan" style="width: 50%;background-color: white;margin-right: 30px" id="">
                    <option value="none" selected disabled>Pilih Tingkatan</option>
                    @foreach ($tingkatan as $item)
                        <option value="{{$item->Pendidikan_ID}}">{{$item->Pendidikan_Keterangan}}</option>
                    @endforeach
                </select>
                <br>
                @if (session("dark") == "true")
                    <button type="submit" value = "-1" class="btn waves-effect tombol" name="btnCari" style="background-color: #616161;">Cari</button>
                    <button type="submit" class="btn waves-effect tombol" name="btnShowAll" style="background-color: #616161;">Show All</button>
                @else
                    <button type="submit" value = "-1" class="btn waves-effect tombol" name="btnCari" style="background-color: #42a5f5;">Cari</button>
                    <button type="submit" class="btn waves-effect tombol" name="btnShowAll" style="background-color: #42a5f5;">Show All</button>
                @endif
            </div>
        </form>
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
                <form action="/detail_course" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->Les_ID}}">
                    @if (session("dark") == "true")
                        <button class="btn waves-effect tombol" type="submit" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                    @else
                        <button class="btn waves-effect tombol" type="submit" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #42a5f5;">Lihat Detail<i class="material-icons right" style="margin-left: 5px;">save</i></button>
                    @endif
                </form>
            </div>
        @endforeach
        </div>
    </div>
@endsection

