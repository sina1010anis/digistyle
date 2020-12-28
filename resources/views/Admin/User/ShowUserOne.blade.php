@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_Show_User">
        <h4>نام : {{$user->Name}}</h4>
        <hr>
        <p> ایمیل : {{ $user->email }} </p>
        <p> نقش : @if ($user->Roule == 1)
            مدیر
            @else
                      کاربر عادی
        @endif </p>
        <p> کد ملی : @if ($user->CodeMil == 0)
                وارد نشده
            @else
            {{$user->CodeMil}}
            @endif </p>
        <p> تلفن : @if ($user->Phone == 0)
                وارد نشده
            @else
                {{$user->Phone}}
            @endif </p>
        <p> جنسیت : @if ($user->Sex == 1)
                مرد
            @else
                زن
            @endif </p>
        <p> موبایل : @if ($user->Mobile == 0)
                وراد نشده
            @else
                {{$user->Mobile}}
            @endif </p>
        <p> کشور : @if ($user->State == 'null')
                وراد نشده
            @else
                {{$user->State}}
            @endif </p>
        <p> شهر : @if ($user->City == 'null')
                وراد نشده
            @else
                {{$user->City}}
            @endif </p>
        <hr>
        <p> وضعیت تایید ایمیل : @if ($user->email_verified_at == Null)
                تایید نشده
            @else
                تایید شده
            @endif </p>
        <p> عکس : @if ($user->Image == 'null')
                انتخاب نشده
            @else
                <img width="100px" height="100px" src="{{url('/Data_User/Image/PhotoUser/').'/'.$user->Image}}" alt="">
            @endif </p>
    </div>
@endsection
