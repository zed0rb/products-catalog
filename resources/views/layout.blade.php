<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/css.css')}}" rel="stylesheet" >

</head>
<body>

    <div class="container">
        @yield('content')
    </div>

</body>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}" type="text.javascript"></script>
<script src="https://kit.fontawesome.com/f372ce4aed.js"></script>
</html>
