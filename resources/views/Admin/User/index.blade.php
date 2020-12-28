@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_New_User">
        @error('Name')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        @error('email')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        @error('password')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        <?php
        if (session('msg')) {
            echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
        }
        ?>
            <form action="{{route('NewUser_admin')}}" method="post">
                @csrf
                <input type="text" name="Name" placeholder="نام کاربر" {{old('Name')}}>

                <input type="text" name="email" placeholder="ایمیل" {{old('email')}}>
                <input type="password" name="Password" placeholder="پسورد">
                <select name="Roule">
                    <option value="0">کاربر عادی</option>
                    <option value="1">مدیر</option>
                </select>
                <select name="Sex">
                    <option value="1">مرد</option>
                    <option value="0">زن</option>
                </select>
                <div class="object_center">
                    <button class="btn_BLUE">ایجاد</button>
                </div>
            </form>
    </div>
@endsection
