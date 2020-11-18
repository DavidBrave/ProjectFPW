@extends('mainpage')
@section('content')
    <style>
        #container{
            grid-template-rows: 120px auto 100px;
        }
        #create-class-container{
            background-color: white;
            width: 800px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            padding: 40px;
            border-radius: 10px;
        }
        .input-field label {
            top: 0.2rem;
        }
        .input-field.col label {
            left: 0rem;
        }
    </style>
    @if (session("pesan"))
        <script>
            alert('{{session("pesan")}}');
        </script>
    @endif
    <div id="create-class-container">
        <form action="/tambah_kelas" method="post">
            @csrf
            <h2 style="margin: 0px; margin-bottom: 50px;">Buat Kelas</h2>
            <div class="input-field col s6">
                <input type="text" name="name" style="width: 600px; margin-bottom: 10px;" value="{{old("name")}}"><br><br>
                @error('name')
                    <div style="color: red;">{{$message}}</div>
                @enderror
                <label for="name" style="margin-bottom: 10px;">Nama</label>
            </div>
            <div class="input-field col s12" style="width: 600px; margin-bottom: 20px;">
                <select name="pelajaran">
                    <option value="none" disabled selected>--Pilih pelajaran--</option>
                    @isset($pelajaran)
                        @foreach ($pelajaran as $item)
                            @if (old("pelajaran") == $item->Pelajaran_ID)
                                <option value="{{$item->Pelajaran_ID}}" disabled selected>{{$item->Pelajaran_Nama}}</option>
                            @endif
                            <option value="{{$item->Pelajaran_ID}}">{{$item->Pelajaran_Nama}}</option>
                        @endforeach
                    @endisset
                </select>
                @error('pelajaran')
                    <div style="color: red;">{{$message}}</div>
                @enderror
            </div>
            <div class="input-field col s12" style="width: 600px; margin-bottom: 20px;">
                <select name="tingkatan">
                    <option value="none" disabled selected>--Pilih tingkat pendidikan--</option>
                    @isset($tingkatan)
                        @foreach ($tingkatan as $item)
                            @if (old("tingkatan") == $item->Pendidikan_ID)
                                <option value="{{$item->Pendidikan_ID}}" disabled selected>{{$item->Pendidikan_Keterangan}}</option>
                            @endif
                            <option value="{{$item->Pendidikan_ID}}">{{$item->Pendidikan_Keterangan}}</option>
                        @endforeach
                    @endisset
                </select>
                @error('tingkatan')
                    <div style="color: red;">{{$message}}</div>
                @enderror
            </div>
            <div class="input-field col s6">
                <input type="number" name="slot" style="width: 600px; margin-bottom: 10px;" min="0" value="{{old("slot")}}"><br>
                @error('slot')
                    <div style="color: red;">{{$message}}</div>
                @enderror
                <label for="slot" style="margin-bottom: 10px;">Slot</label>
            </div>
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" style="width: 600px; margin-bottom: 10px;" name="deskripsi">{{old("deskripsi")}}</textarea>
                <label for="textarea1">Deskripsi</label>
            </div>
            <p>Waktu: </p>
            <div class="input-field col s12">
                <input type="text" class="timepicker" id="waktu" name="waktu" style="width: 600px;" value="{{old("waktu")}}"><br>
                @error('waktu')
                    <div style="color: red;">{{$message}}</div>
                @enderror
            </div>
            <button class="btn waves-effect blue lighten-1 btnLogin" type="submit" style="border-radius: 5px;">Submit</button>
        </form>
    </div>
@endsection
