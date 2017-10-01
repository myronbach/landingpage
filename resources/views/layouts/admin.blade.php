<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>
        @if(isset($title))
            {{$title}}
        @else
            {{'Unique'}}
        @endif

    </title>

    <link rel="icon" href="{{asset('assets/')}}favicon.png" type="image/png">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>


</head>
<body>
<header id="header_wrapper">
    @yield('header')


    @if(session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('status')}}
        </div>
    @endif
</header>


    @yield('content')

</body>
</html>

