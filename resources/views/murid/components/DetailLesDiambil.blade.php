@extends('mainpage')
@section('content')
    <style>
        #temp-dld{
            background-color: white;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 800px;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <div id="dld-container">
        <div id="temp-dld">
            <h4 style="margin-left: 5px;">{{$les->pelajaran->Pelajaran_Nama}}</h4>
            @if ($les->pivot->Pengambilan_Status != 2 )
                <p style="margin-left: 5px;">Status :
                @if ($les->pivot->Pengambilan_Status == 0)
                    Permintaan join les belum dikonfirmasi</p>
                @else
                    Permintaan join les ditolak</p>
                @endif
            @else
                <p style="margin-left: 5px;">Status : Sedang Mengikuti</p>
            @endif
            <table>
                <tr>
                    <td>Tingkat Pendidikan</td>
                    <td>: {{$les->tingkatan->Pendidikan_Keterangan}}</td>
                </tr>
                <tr>
                    <td>Pengajar </td>
                    <td>: {{$les->guru->Guru_Nama}}</td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>: {{$les->guru->Guru_Email}}</td>
                </tr>
                <tr>
                    <td>Rating </td>
                    <td>:
                        @if ($les->Jum_Orang_Rating == 0)
                            Belum dirating
                        @else
                            {{$les->Rating}} / 5 dari {{$les->Jum_Orang_Rating}} Suara
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Sisa slot </td>
                    <td>: {{$les->Sisa_Slot}} dari {{$les->Slot}}</td>
                </tr>
            </table>
            <p style="margin-left: 5px;">
                Deskripsi : <br>
                {{$les->Deskripsi}}
            </p>
            @if ($les->pivot->Pengambilan_Status != 2 )
                <form action="/murid_batal_ajukan_join_les" method="get">
                    <button class="btn waves-effect red darken-3" type="submit" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;"
                    onclick="return confirm('Apakah anda yakin akan membatalkan permintaan untuk join di les ini?')">Membatalkan permintaan untuk join les<i class="material-icons right" style="margin-left: 5px;">close</i></button>
                </form>
            @else
                <form action="/murid_rating_kelas" method="get">
                    <button class="btn waves-effect red darken-3" type="submit" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px; width: 120px; font-size: 12px; padding-left: 5px; padding-right: 5px; background-color: #616161;"
                     onclick="return confirm('Apakah anda yakin akan keluar dari les ini?')">Keluar Les<i class="material-icons right" style="margin-left: 5px;">exit_to_app</i></button>
                </form>
            @endif
        </div>
    </div>
@endsection
