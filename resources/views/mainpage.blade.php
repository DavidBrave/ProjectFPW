<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Course</title>
    <link rel="stylesheet" href="{{asset("materialize/css/materialize.css")}}">
    <link rel="stylesheet" href="{{asset("jquery.js")}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset("jquery-3.4.1.min.js")}}"></script>
</head>
<style>
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
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
