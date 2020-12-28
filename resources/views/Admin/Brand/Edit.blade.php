@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_Edit_Brand">
        <h4 align="center">تغییرات در برند ({{$DataA['Name']}})</h4>
        <form action="{{route('BrandEditIndex_admin' , $DataA['Id'])}}" method="post">
            @csrf
            <input type="text" name="NameEdit" placeholder="نام برند" value="{{$DataA['Name']}}">
            @error('NameEdit')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <input type="text" name="CountryEdit" placeholder="کشور سازنده" value="{{$DataA['Country']}}">
            @error('CountryEdit')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <div style="margin-top: 20px" class="object_center">
                <button class="btn_ORANGE" type="submit">ذخیره</button>
            </div>
        </form>
    </div>
@endsection
