@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_Edit_Brand">
        <?php
        if (session('msg')) {
            echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
        }
        ?>
        <h4 dir="rtl" align="center">تغییرات در کاربر ({{$user->Name}})</h4>
        <form action="{{route('UserUpdate_admin' , $user->Name)}}" method="post">
            @csrf
            @method('put')
            <input type="text" name="Name" placeholder="نام کاربر" value="{{$user->Name}}">
            @error('Name')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <input type="email" name="email" placeholder="ایمیل" value="{{$user->email}}">
            @error('email')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <input type="password" name="password" placeholder="رمز عبور">
            @error('password')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <div style="margin-top: 20px" class="object_center">
                <button class="btn_GREEN" type="submit">ذخیره</button>
            </div>
        </form>
    </div>
@endsection
