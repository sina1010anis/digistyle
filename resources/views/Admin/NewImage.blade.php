@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_New_Image">
        <div id="PartOne">
            <h4 align="center">ایجاد عکس اسلایدر</h4>
            <hr>
            <form id="FormNewPhotoSlid" action="" method="post" enctype="multipart/form-data">
                <input type="text" name="Name" placeholder="نام عکس">
                <input type="file" name="Image">
                <label>برای کدام محصول</label>
                <select name="id_product" id="">
                    @foreach($products as $i)
                        <option value="{{$i->id}}">{{$i->Name}}</option>
                    @endforeach
                </select>
                <label>برای کدام برند</label>
                <select name="id_brand" id="">
                    @foreach($brands as $i)
                        <option value="{{$i->id}}">{{$i->Name}}</option>
                    @endforeach
                </select>
                <div class="object_center">
                     <button class="btn_BLUE">ذخیره</button>
                </div>
            </form>
        </div>
        <div id="PartTow">
            <h4 align="center">ایجاد عکس بنر</h4>
            <hr>
            <form id="FormNewPhotoBaner" action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="NameB" placeholder="نام عکس">
                <input type="file" name="ImageB">
                <label>برای کدام برند</label>
                <select name="id_brandB" id="">
                    @foreach($brands as $i)
                        <option value="{{$i->id}}">{{$i->Name}}</option>
                    @endforeach
                </select>
                <div class="object_center">
                    <button class="btn_BLUE">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
    <div id="Page_To_Page"></div>
@endsection
