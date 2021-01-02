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
        @include('Message')
        <div id="Shit_Register">
            <form method="POST" action="{{ route('CompletionProfile') }}">
                @csrf

                <div class="form-group row">
                    <label for="CodeMil" class="col-md-4 col-form-label text-md-right">{{ __('کد ملی') }}</label>
                    <input type="text" id="CodeMil" name="CodeMil">
                </div>
                <div class="form-group row">
                    <label for="Phone" class="col-md-4 col-form-label text-md-right">{{ __('تلفن') }}</label>
                    <input type="number" id="Phone" name="Phone">
                </div>
                <div class="form-group row">
                    <label for="Sex" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت') }}</label>
                    <br>
                    <label for="Sex1">مرد</label>
                    <input type="radio" id="Sex1" name="Sex" value="1">
                    <br>
                    <label for="Sex0">زن</label>
                    <input type="radio" id="Sex0" name="Sex" value="0">
                    <br>
                    <br>
                </div>
                <div class="form-group row">
                    <label for="Mobile" class="col-md-4 col-form-label text-md-right">{{ __('موبایل') }}</label>
                    <input type="number" id="Mobile" name="Mobile">
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ثبت نام') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>


