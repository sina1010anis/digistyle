@extends('User.Section.index')

@section('MenuUser')
    @include('Message')
    <div id="PageAMenuEditProfileUser">
        <h4 dir="rtl">ویرایش پروفایل</h4>
        <div id="formEditProfileUser">
            <form action="{{route('EditProfileCreateUser_user' , auth()->user()->Name)}}" method="post">
                @csrf
                <label>نام</label>
                <input type="text" name="Name" value="{{auth()->user()->Name}}">
                <br>
                <br>
                <label>کد ملی</label>
                <input type="text" name="CodeMil" value="{{auth()->user()->CodeMil}}">
                <br>
                <br>
                <label>تلفن</label>
                <input type="text" name="Phone" value="{{auth()->user()->Phone}}">
                <br>
                <br>
                <label>جنسیت</label>
                <br>
                <input type="radio" name="SexUserProfile" <?php if (auth()->user()->Sex == 1){
                    echo 'checked';
                } ?>  value="1">مرد
                <br>
                <input type="radio" name="SexUserProfile" <?php if (auth()->user()->Sex == 0){
                    echo 'checked';
                } ?> value="0">زن
                <br>
                <br>
                <label>ایمیل</label>
                <input type="text" name="email" value="{{auth()->user()->email}}">
                <br>
                <br>
                <label>موبایل</label>
                <input type="text" name="Mobile" value="{{auth()->user()->Mobile}}">
                <br>
                <br>
                <div class="object_center">
                    <button type="submit" class="btn_BLUE_BG">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
@endsection
