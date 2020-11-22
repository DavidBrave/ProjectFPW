<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="resources\js\jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="{{asset("materialize/css/materialize.css")}}">
    <link rel="stylesheet" href="{{asset("jquery.js")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
    .checked {
        color: orange;
    }
    body{
        background-color: #bfe6ff;
    }
    #container{
        display: grid;
        grid-template-rows: 120px 900px 100px;
    }
</style>
<body>
    <div id="container">
        @include('includes.headerMurid')
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
