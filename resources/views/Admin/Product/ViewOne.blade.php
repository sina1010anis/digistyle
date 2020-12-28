@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_One_Product">
        <?php
        if (session('msg')) {
            echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
        }
        ?>
            @error('Item')
            <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            @error('Name')
            <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
        <span style="width: 50%;float: right;height: 100%">
            <h4>نام : {{$id->Name}}</h4>
            <hr>
            <p> توضیحات : {{ $id->DE }} </p>
            <p> قیمت : {{ $id->Price }}</p>
            <p> عکس اصلی :                 <img width="100px" height="100px" src="{{url('/Data_User/Image/').'/'.$id->Image}}" alt=""></p>
            <hr>
            <p> وضعیت : @if ($id->Status == 1)
                    قابل نمایش
                @else
                    عدم نمایش
                @endif </p>
        </span>
        <span style="width: 50%;float: left;height: 100%">
            <h4>مشخصات اصلی محصول : {{$id->Name}}</h4>
            <hr>
            @foreach($Category as $i)
            <p> دسته اصلی : {{ $i->NameItem }} </p>
            @endforeach
            <form>
                <label>خصوصیات</label>
                <select>
                    @foreach($attr as $i)
                        <option value="">{{$i->Name}} => {{$i->Item}}</option>
                    @endforeach
                </select>
                <br>
            </form>

            <button id="OpenPageAddAttr" style="padding: 8px 20px!important;" class="btn_GREEN">اضافه کردن خصوصیات</button>
            <button id="OpenPageAddImage" style="padding: 8px 20px!important;" class="btn_GREEN">اضافه کردن عکس</button>
            <br>
            <br>
                        @foreach($img as $i)
                            <span style="border: 1px solid red;overflow: revert">
                <img class="ImageOneProduct" width="60px" height="60px" src="{{url('/Data_User/Image/Product/').'/'.$i->image}}" alt="">
                <a href="{{route('DeletePhotoOneProduct_admin' , $i->id)}}">حذف</a>
                </span>
                                @endforeach
        </span>
    </div>
    <div id="PageAddAttr">
        <i style="cursor: pointer" id="ClosePageAddAttr" class="fas fa-times"></i>
        <h5 align="center">خصوصیات جدید</h5>
        <form action="{{route('ProductNewAttr_admin' , $id->id)}}" method="post">
            @csrf
            <input type="text" name="Name" placeholder="نام خصوصه" value="{{old('Name')}}">
            @error('Name')
            <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <input type="text" name="Item" placeholder="خود خصوصه" value="{{old('Item')}}">
            @error('Item')
            <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
            @enderror
            <div class="object_center">
                <button class="btn_GREEN">ذخیره</button>
            </div>
        </form>
    </div>
    <div id="PageAddPhoto">
        <i style="cursor: pointer" id="ClosePageAddImage" class="fas fa-times"></i>
        <h5 align="center">ایجاد عکس جدید</h5>
        <form enctype="multipart/form-data" action="" id="FormNewPhotoProduct" method="post">
            @csrf
            <input type="file" name="Image" placeholder="نام خصوصه" value="{{old('Name')}}">
            <div class="object_center">
                <button id="{{$id->id}}" class="btn_GREEN">ذخیره</button>
            </div>
        </form>
    </div>
    <div id="ViewProduct">
        <i style="cursor: pointer" id="ClosePageViewImage" class="fas fa-times"></i>
        <img style="border-radius: 5px" width="100%" height="100%" src="" alt="">
    </div>
@endsection
