@extends('mainpage')
@section('content')


<h1>Rating Les</h1>
<h2>{{$les->Nama}}</h2>
Diajar Oleh {{$les->guru->Guru_Nama}} <br>

<h2>Berikan Rating</h2>
<div class="rating">
    <form action="/murid_keluar_kelas" method="get">
    <span class="bintang fa fa-star" id = "1" value=1></span>
    <span class="bintang fa fa-star" id = "2" value=2></span>
    <span class="bintang fa fa-star" id = "3" value=3></span>
    <span class="bintang fa fa-star" id = "4" value=4></span>
    <span class="bintang fa fa-star" id = "5" value=5></span>

    Rating :
    <span id = "rate">0</span>
    <br>
    <button id="btnRate" name ="btnRate">Rate</button>
    </form>
</div>

<script src="{{asset('jquery-3.4.1.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.bintang').click(
            function() {
                $(".bintang").attr('class', 'bintang fa fa-star');
                $(this).prevAll().attr('class', 'bintang fa fa-star checked');
                $(this).attr('class', 'bintang fa fa-star checked');
                $("#btnRate").val($(this).attr("id"));
                $("#rate").text($(this).attr("id"));
            }
        );
    });
</script>
@endsection
