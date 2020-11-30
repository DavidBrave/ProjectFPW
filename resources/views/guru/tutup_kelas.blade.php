@extends('mainpage')
@section('content')
    <style>
        #container{
            grid-template-rows: 120px auto 100px;
        }
        #close-class-container{
            padding: 40px;
        }
        .temp-les{
            display: grid;
            grid-template-rows: 60px 120px 60px;
            margin: 50px;
            height: 250px;
            border-radius: 10px;
            background-color: white;
            padding: 10px;
        }
    </style>
    @if (session("message"))
        <script>
            alert('{{session("message")}}');
        </script>
    @endif
    <div id="close-class-container">
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
                    <p style="font-size: 16px; margin: 5px;">Tingkat : {{$item->tingkatan->Pendidikan_Keterangan}}</p>
                    <p style="font-size: 16px; margin: 5px;">Sisa slot : {{$item->Sisa_Slot}} dari {{$item->Slot}}</p>
                </div>
                <form action="/guru/tutup" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->Les_ID}}">
                    <button class="btn waves-effect red darken-3" type="submit" style="display: block; margin-left: auto; margin-right: auto; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px;"
                    onclick="return confirm('Apakah anda yakin menutup les ini?')">Tutup<i class="material-icons right" style="margin-left: 5px; margin-right: 10px;">close</i></button>
                </form>
            </div>
        @endforeach
        </div>
    </div>
@endsection
