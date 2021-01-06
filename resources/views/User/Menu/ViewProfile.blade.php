@extends('User.Section.index')

@section('MenuUser')
    <div id="PageAMenuUser">
        <h4 dir="rtl">اطلعات مشتری حقیقی</h4>
        <br>
        <br>
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>نام نام خانوادگی : {{auth()->user()->Name}}</td>
                <td>ادرس ایمیل : {{auth()->user()->email}}</td>
            </tr>
            <tr>
                <td>کد ملی : {{auth()->user()->CodeMil}}</td>
                <td>تلفن : {{auth()->user()->Phone}}</td>
            </tr>
            <tr>
                <td>موبایل : {{auth()->user()->Mobile}}</td>
                <td>جنسیت :
                @if(auth()->user()->Sex == 0)
                    زن
                    @endif
                    @if(auth()->user()->Sex == 1)
                        مرد
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{route('EditProfile_user')}}" class="btn_Border_Black_Bug">ویرایش</a>
    </div>
@endsection
