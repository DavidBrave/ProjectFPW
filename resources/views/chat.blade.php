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
            padding: 20px 40px 20px 40px;
            margin-top: 50px;
            min-height: 667px;
            height: auto;
        }
        textarea#isichat.materialize-textarea{
            padding: 0px;
            width: 85%;
        }
        div.input-field.col.s12{
            padding: 0px;
        }
        i.material-icons.send{
            position: absolute;
            bottom: 20px;
            font-size: 35px;
            margin-left: 20px;
        }
        #chat-container{
            overflow-y: scroll;
            min-height: 450px;
            max-height: 450px;
            margin-top: 20px;
        }
        .kotak-chat1{
            border-radius: 15px;
            padding: 10px 15px 10px 15px;
            max-width: 300px;
            height: auto;
            background-color: #bdbdbd;
            float: left;
            text-align: left;
        }
        .kotak-chat2{
            border-radius: 15px;
            padding: 10px 15px 10px 15px;
            max-width: 300px;
            height: auto;
            background-color: #81d4fa;
            float: right;
            text-align: right;
        }
        .pp-mini{
            width: 20px;
            height: 20px;
            border-radius: 50%;
            float: left;
        }
    </style>
    @if (session("message")!=null)
        <script>alert("{{session('message')}}");</script>
    @endif
    <script>
        $(document).ready(function () {
            $("#imgfile").change(function () {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("imgfile").files[0]);

                oFReader.onload = function (oFREvent) {
                    $("#photo-profile").css("background-image", "url('" + oFREvent.target.result + "')");
                    $("#photo-profile").css("background-size", "cover");
                };
            });

            $("#btnSend").click(function () {
                $.ajax({
                    method : "get",
                    url : "/send",
                    data : {
                        id : $("#lesId").val(),
                        isi : $("#isichat").val()
                    }
                });
                $("#isichat").val("");
            });

            setInterval(function () {
                $("#chat-container").load("/refresh/" + $("#lesId").val())
            }, 500);
        });
    </script>
    <div id="dld-container">
        <div id="temp-dld">
            <input type="hidden" id="lesId" value="{{$les->Les_ID}}">
            <h4>{{$les->Nama}}</h4>
            <hr>
            <div id="chat-container">

            </div>
            <div style="position: absolute; bottom: 20px; width: 70%; left: 18%;">
                <textarea id="isichat" class="materialize-textarea" placeholder="Type a message..."></textarea>
                @if (session("dark") == "true")
                    <a href="javascript:void(0)" id="btnSend"><i class="material-icons send" style="color: #616161;">send</i></a>
                @else
                    <a href="javascript:void(0)" id="btnSend"><i class="material-icons send" style="color: #42a5f5;">send</i></a>
                @endif
            </div>
        </div>
    </div>
@endsection
