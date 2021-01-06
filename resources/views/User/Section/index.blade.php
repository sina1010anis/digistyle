<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل کاربری</title>
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('/css/index/style.css')}}">
    <link rel="stylesheet" href="{{url('/css/admin/shit.css')}}">
    <link rel="stylesheet" href="{{url('Tools/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('Tools/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('Tools/slick.css')}}">
    <link rel="stylesheet" href="{{url('Tools/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('Tools/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{url('Tools/jquery-ui.theme.min.css')}}">
    <script src="{{url('/js/Tools/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('/js/index/java.js')}}"></script>
    <script src="{{url('/js/Tools/jquery.cycle.all.js')}}"></script>
    <script src="{{url('Tools/owl.carousel.min.js')}}"></script>
    <script src="{{url('Tools/slick.min.js')}}"></script>
    <script src="{{url('Tools/jquery-ui.min.js')}}"></script>
    <style>
        a{
            text-decoration: none!important;
        }
    </style>
</head>
<body>
<div id="box">
    <div id="to_box">
@include('Front.Section.TopMenu')
        <div id="ImageAndNameUser">
            <div id="ImageProfile">
                @if(auth()->user()->Image != 'null')
                    <img title="تغییر عکس پروفایل" src="{{url('Data_User/Image/ImageProfile').'/'.auth()->user()->Image}}" alt="">
                @endif
            </div>
            <div id="NameProfile">
                <span dir="rtl">میز کار خوصوصی {{auth()->user()->Name}}</span>
            </div>
            <div id="Option">
            <span id="OptionNumberOrders">
                تعداد کل سفارشات :
                 <span>{{$orders}}</span>
            </span>
                <span id="OptionNumberOrdersOK">
                سفارشات در حال تایید :
                 <span>{{$ordersStop}}</span>
            </span>
                <span id="OptionNumberOrdersStop">
                سفارشات در حال برسی :
                 <span>{{$ordersOK}}</span>
            </span>
            </div>
        </div>
        <div id="MenuPanelUserDis">
        <span id="Menu">
            <a href="{{route('UserPanelIndex_user')}}" dir="rtl"> <i class="fas fa-caret-left"></i> حساب کاربری </a>
            <a href="{{route('ViewOrders_user')}}" dir="rtl"> <i class="fas fa-caret-left"></i> سفارشات </a>
            <a href="{{route('ViewCart_user')}}" dir="rtl"> <i class="fas fa-caret-left"></i> لیست خرید های بعدی </a>
            <a href="{{route('ViewComments_user')}}" dir="rtl"> <i class="fas fa-caret-left"></i> نظرات من </a>
            <a href="#" dir="rtl"> <i class="fas fa-caret-left"></i> لیست کد تخفیف </a>
            <a href="#" dir="rtl"> <i class="fas fa-caret-left"></i> کارت هدیه </a>
            <form action="{{route('logout')}}" method="post">
                            <button type="submit">
                                <i class="fas fa-caret-left"></i> خروج
                            </button>
            </form>
        </span>
            <span id="Dis">
            @yield('MenuUser')
        </span>
        </div>
    </div>
</div>
<span class="object_center_span" id="PageSelectImageProfile">
    <form action="" method="post" enctype="multipart/form-data" id="FormSelectImageProfile">
        <input type="file" name="imageProfile" id="">
        <button type="submit" class="btn_BLUE">ذخیره</button>
    </form>
</span>
</body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>
