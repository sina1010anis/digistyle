
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عضویت</title>
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('/css/register/style.css')}}">
    <link rel="stylesheet" href="{{url('/css/admin/shit.css')}}">
    <script src="{{url('/js/Tools/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('/js/Admin/java.js')}}"></script>
</head>
<body>
<div id="box">
    <div id="to_box">
        <div id="title">
            <span style="float: left">ایران شاپ</span>
            <span style="float: right"><a>تکمیل مشخصات کاربری <i class="fas fa-user"></i></a></span>
        </div>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('یک ایمیل با نوضوع این سایت ارسال شده یا در inbox یا در سمپ قابل مشاهده است.') }}
                </div>
            @endif

            {{ __('برای ثبت سفارش باید ایمیل خود را تایید کند.') }}
            {{ __('اگر تایید نکنید قادر به سفارش محصول نیستید') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ارسال تاییده به ایمیل') }}</button>.
            </form>
        </div>
    </div>
</div>
</body>
</html>


