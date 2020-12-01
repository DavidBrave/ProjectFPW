@extends('mainpage')
@section('content')
    <style>
        #temp-chat{
            position: relative;
            background-color: white;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            min-height: 667px;
            height: auto;
            width: 600px;
            padding: 20px 30px 40px 40px;
            margin-top: 50px;
        }
        .collection a.collection-item{
            color: black;
            height: 50px;
            line-height: 30px;
        }
        #temp{
            overflow-y: scroll;
            height: 500px;
            padding: 10px;
        }
    </style>
    <div id="listchat-container">
        <div id="temp-chat">
            <h4>Group Chat</h4><br>
            <div id="temp">
                <div class="collection">
                    @foreach ($les as $item)
                        <a href="/kirim_chat/{{$item->Les_ID}}" class="collection-item">{{$item->Nama}} ({{count($item->murid)}})</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
