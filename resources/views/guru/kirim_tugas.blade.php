@extends('mainpage')
@section('content')
    <style>
        #temp-dld{
            background-color: white;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 800px;
            padding: 30px;
            margin-top: 50px;
            min-height: 620px;
            height: auto;
        }
        .input-field label {
            top: 0.2rem;
        }
        .input-field.col label {
            left: 0rem;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <div id="dld-container">
        <div id="temp-dld">
            <h4>Tugas {{$les->Nama}}</h4><br><br>
            <form action="/guru/kirim" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$les->Les_ID}}">
                <div class="file-field input-field">
                @if (session("dark") == "true")
                    <div class="btn tombol" style="background-color: #616161;">
                @else
                    <div class="btn tombol" style="background-color: #42a5f5;">
                @endif
                        <span>File</span>
                        <input type="file" name="myfile[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
                @if (session("pesan")!=null)
                    <div style="color: red;">{{session('pesan')}}</div>
                @endif
                @error('myfile')
                    <div style="color: red;">{{$message}}</div>
                @enderror
                <div class="input-field col s12">
                    <textarea id="desc" class="materialize-textarea" name="desc"></textarea>
                    <label for="desc">Description</label>
                </div>
                @if (session("dark") == "true")
                    <button class="btn waves-effect tombol" type="submit" style="background-color: #616161;">Kirim<i class="material-icons right">send</i></button>
                @else
                    <button class="btn waves-effect tombol" type="submit" style="background-color: #42a5f5;">Kirim<i class="material-icons right">send</i></button>
                @endif
            </form>
        </div>
    </div>
@endsection
