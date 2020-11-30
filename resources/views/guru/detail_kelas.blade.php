@extends('mainpage')
@section('content')
    <style>
        #temp-dld{
            position: relative;
            background-color: white;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 800px;
            padding: 20px;
            margin-top: 50px;
        }
        .fixed-action-btn{
            position: absolute;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <div id="dld-container">
        <div id="temp-dld">
            <h4 style="margin-left: 5px;">{{$les->pelajaran->Pelajaran_Nama}}</h4>
            <table>
                <tr>
                    <td>Tingkat Pendidikan</td>
                    <td>: &nbsp&nbsp&nbsp {{$les->tingkatan->Pendidikan_Keterangan}}</td>
                </tr>
                <tr>
                    <td>Pengajar </td>
                    <td>: &nbsp&nbsp&nbsp {{$les->guru->Guru_Nama}}</td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>: &nbsp&nbsp&nbsp {{$les->guru->Guru_Email}}</td>
                </tr>
                <tr>
                    <td>Rating </td>
                    <td>: &nbsp&nbsp&nbsp
                        @if ($les->Jum_Orang_Rating == 0)
                            Belum dirating
                        @else
                            <img src="{{asset("Images/star.png")}}" alt="" style="width: 15px; height: 15px;">{{$les->Rating}}&nbsp&nbsp({{$les->Jum_Orang_Rating}})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Sisa slot </td>
                    <td>: &nbsp&nbsp&nbsp {{$les->Sisa_Slot}}</td>
                </tr>
            </table>
            <p style="margin-left: 5px; margin-bottom: 30px;">
                Deskripsi : <br>
                {{$les->Deskripsi}}
            </p>
            <hr>
            <div class="fixed-action-btn">
                @if (session("dark") == "true")
                    <a class="btn-floating btn-large tombol" style="background-color: #616161;">
                @else
                    <a class="btn-floating btn-large tombol" style="background-color: #42a5f5;">
                @endif
                    <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                    <li><a class="btn-floating purple lighten-2" href="#"><i class="material-icons">chat</i></a></li>
                    <li><a class="btn-floating blue" href="#"><i class="material-icons">attach_file</i></a></li>
                </ul>
            </div>
            <h5 style="margin-left: 5px;">Murid</h5><br>
            <ul class="collection" style="margin-left: 5px;">
                @foreach ($les->murid as $item)
                    <li class="collection-item avatar">
                        @if ($item->Murid_Photo)
                            <img src="{{asset("storage/Photos/".$item->Murid_Photo)}}" alt="" class="circle">
                        @else
                            <img src="{{asset("storage/Photos/nophoto.png")}}" alt="" class="circle">
                        @endif
                        <span class="title">{{$item->Murid_Nama}}</span>
                        <p>{{$item->Murid_Email}}</p>
                    </li>
                @endforeach
            </ul><br><br><br>
        </div>
    </div>
@endsection
