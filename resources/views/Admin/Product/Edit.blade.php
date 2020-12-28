@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_Edit_Brand">
        <h4 align="center">تغییرات در محصول ({{$id->Name}})</h4>
        <form action="{{route('ProductIndexEdit_admin' , $id->Name)}}" method="post">
            @csrf
            <input type="text" name="Name" placeholder="نام محصول" value="{{$id->Name}}">
            @error('Name')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <input type="text" name="Price" placeholder="قیمت" value="{{$id->Price}}">
            @error('Price')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            @foreach ($Category as $i)
                <label>دسته فعلی : {{$i->NameItem}}</label>
            @endforeach
            <select name="Category" id="">
                @foreach ($CategoryAll as $i)
                    <option <?php if ($id->Category == $i->id) {
                        echo 'selected';
                    } ?>  value="{{$i->id}}">{{$i->NameItem}}</option>
                @endforeach
            </select>
            <textarea  name="DE" placeholder="توضیحات">{{$id->DE}}</textarea>
            @error('DE')
            <div dir="rtl" align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <div style="margin-top: 20px" class="object_center">
                <button class="btn_ORANGE" type="submit">ذخیره</button>
            </div>
        </form>
    </div>
@endsection
