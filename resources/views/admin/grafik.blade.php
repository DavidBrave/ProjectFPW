@extends('mainpage')
@section('content')
    <style>
        #container{
            grid-template-rows: 120px auto 100px;
        }
    </style>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        $(document).ready(function () {
            var arr1 = JSON.parse($("#arr1").val());
            var arr2 = JSON.parse($("#arr2").val());
            var arr3 = JSON.parse($("#arr3").val());
            var arrData = [];
            for (let i = 0; i < arr1.length; i++) {
                arrData.push({y: arr2[i], label: arr1[i] + "-" + arr3[i], indexLabel: arr2[i] + " Murid"});
            }

            $(".chartContainer").CanvasJSChart({
                animationEnabled: true,
                title: {
                    text: "Total murid yang diajar masing-masing guru",
                    fontColor: "#01579b "
                },
                axisY: {
                    tickThickness: 0,
                    lineThickness: 0,
                    includeZero: true,
                    gridThickness: 0
                },
                axisX: {
                    tickThickness: 0,
                    lineThickness: 0,
                    labelFontSize: 18,
                    labelFontColor: "#01579b ",
                    interval: 1
                },
                data: [{
                    indexLabelFontSize: 26,
                    toolTipContent: "<span style=\"color:#01579b\">{label}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "white",
                    indexLabelFontWeight: 600,
                    indexLabelFontFamily: "Verdana",
                    color: "#1976d2 ",
                    type: "bar",

                    dataPoints: arrData
                }]
            });
        });
    </script>
    <div id="guru-profile-container" style="padding: 20px 40px 20px 40px;">
        @if (session("dark") == "true")
            <h2 style="color: white;" id="txtPersonal">Grafik</h2>
        @else
            <h2 id="txtPersonal">Grafik</h2>
        @endif
        <input type="hidden" id="arr1" value="{{$arr1}}">
        <input type="hidden" id="arr2" value="{{$arr2}}">
        <input type="hidden" id="arr3" value="{{$arr3}}">
        <div class="chartContainer" style="height: 500px; width: 70%;"></div>
    </div>
@endsection
