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
    {!! htmlScriptTagJsApi() !!}
</head>
<body>
<div id="box">
    <div id="to_box">
        <div id="title">
            <span style="float: left">ایران شاپ</span>
            <span style="float: right"><a href="{{route('login')}}">ورود <i class="fas fa-user"></i></a></span>
        </div>
        <div id="Shit_Register">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name"
                           class="col-md-4 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback err_alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}">

                        @error('email')
                        <span class="invalid-feedback err_alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('پسورد') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password">

                        @error('password')
                        <span class="invalid-feedback err_alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('تکرار پسورد') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation">
                    </div>
                </div>
                <div style="margin-top: 10px" class="col-md-6">
                    {!! htmlFormSnippet([
        "size" => "100%",
]) !!}
                </div>
                @error('g-recaptcha-response')
                <span class="invalid-feedback err_alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
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
<a href="{{url('/auth/googel')}}">ورود با گوگل</a>
</body>
</html>


