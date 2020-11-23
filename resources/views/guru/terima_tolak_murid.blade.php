@extends('mainpage')
@section('content')
    <style>
        #temp-tt{
            background-color: white;
            width: 50%;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }
        td, th{
            padding: 20px;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <div id="tt-container">
        <div id="temp-tt">
            <table>
                <tr>
                    <th>Murid</th>
                    <th>Les</th>
                    <th colspan="2">Action</th>
                </tr>
                @if (count($murid) == 0)
                <tr>
                    <td colspan="4"><h4 style="text-align: center;">Tidak Ada</h4></td>
                </tr>
                @else
                    @for ($i = 0; $i < count($murid); $i++)
                        <tr>
                            <td>{{$murid[$i]->Murid_Nama}}</td>
                            <td>{{$murid[$i]->pivot->pivotParent->Nama}}</td>
                            <td><button class="btn waves-effect green darken-1" type="submit" name="action" style="font-size: 12px; padding-left: 10px; padding-right: 10px;"><i class="material-icons right">check</i><a style="font-size: 12px;" href="/guru/terima/{{$murid[$i]->pivot->Pengambilan_Murid}}/{{$murid[$i]->pivot->Pengambilan_Les}}">Terima</a></button></td>
                            <td><button class="btn waves-effect red darken-2" type="submit" name="action" style="font-size: 12px; padding-left: 10px; padding-right: 10px;"><i class="material-icons right">clear</i><a style="font-size: 12px;" href="/guru/tolak/{{$murid[$i]->pivot->Pengambilan_Murid}}/{{$murid[$i]->pivot->Pengambilan_Les}}">Tolak</a></button></td>
                        </tr>
                    @endfor
                @endif
            </table>
        </div>
    </div>
@endsection
