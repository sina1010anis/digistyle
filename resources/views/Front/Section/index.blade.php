<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ایران شاپ</title>
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('/css/index/style.css')}}">
    <link rel="stylesheet" href="{{url('/css/admin/shit.css')}}">
    <link rel="stylesheet" href="{{url('Tools/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('Tools/owl.carousel.min.css')}}">
    <script src="{{url('/js/Tools/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('/js/index/java.js')}}"></script>
    <script src="{{url('/js/Tools/jquery.cycle.all.js')}}"></script>
    <script src="{{url('Tools/owl.carousel.min.js')}}"></script>
</head>
<body>
<div id="box">
    <div id="to_box">
        @include('Front.Section.TopMenu')
        @include('Front.Section.Slider')
        @yield('index')
        @include('Front.Section.Footer')

    </div>
</div>
</body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>
