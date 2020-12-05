@extends('mainpage')
@section('content')
    <style>
        #temp-history{
            background-color: white;
            width: 70%;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            min-height: 580px;
            height: auto;
            max-height: 580px;
            overflow-y: scroll;
            padding: 10px;
        }
    </style>
    <script>
        setTimeout(function () {
            $("#temp-history").scrollTop($("#temp-history")[0].scrollHeight);
        }, 100);
    </script>
    <div id="history-container">
        <h2 class="center-align" style="margin-bottom: 0px;">History</h2>
        <div id="temp-history">
            <table class="responsive-table highlight" style="padding-left: 20px;">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tingkatan</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
                @foreach ($les as $item)
                    <tr>
                        <td>{{$item->Les_ID}}</td>
                        <td>{{$item->Nama}}</td>
                        <td>{{$item->tingkatan->Pendidikan_Keterangan}}</td>
                        <td>{{$item->Deskripsi}}</td>
                        @if ($item->trashed())
                            <td>Closed</td>
                        @else
                            <td>Open</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
