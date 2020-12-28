@extends('Admin.Section.index-page')

@section('index')
    <div id="Map_New_Product">
        <span class="LE LE_NEW_F">پایان</span>
        <span class="LE LE_NEW_A">آپلود عکس</span>
        <span class="LE LE_NEW_K">خصوصیات و سایز</span>
        <span class="LE LE_NEW_S">وضعیت</span>
        <span class="LE LE_NEW_C">انتخاب دسته</span>
        <span style="border: 2px solid #5ca958" class="LE LE_NEW_P">ایجاد محصول</span>
        <span style="background-color: #5ca958;color: white" class="LE">مسیر شما</span>
    </div>
    <div id="LE_1">
        <h5 align="center">ایجاد محصول</h5>
        <form id="form_New_Product" action="" method="post">
            @csrf
            <input type="text" name="Name" placeholder="نام محصول">
            <input type="number" name="price" placeholder="قیمت محصول">
            <label for="Brands">انتخاب برند</label>
            <select name="Brands" id="Brands">
                @foreach($Brands as $i)
                    <option value="{{$i->id}}">{{$i->Name}}</option>
                @endforeach
            </select>
            <textarea dir="rtl" id="DE" name="DE" placeholder="توضیحات"></textarea>
            <button class="LE_BU">مرحله بعدی</button>
        </form>
    </div>
    <div id="LE_2">
        <h5 align="center">دسته بندی</h5>
        <form id="form_New_Product2" action="" method="post">
            @csrf
            <label>منو سطح سه</label>
            <select name="Item_Product" id="">
                @foreach($Items as $i)
                    <option value="{{$i->id}}">{{$i->NameItem}}</option>
                @endforeach
            </select>
            <label>منو سطح دو</label>
            <select name="SubMenu" id="">
                @foreach($Category as $i1)
                    <option value="{{$i1->id}}">{{$i1->NameCategory}}</option>
                @endforeach
            </select>
            <label>منو سطح یک</label>
            <select name="Parent" id="">
                @foreach($Parent as $i3)
                    <option value="{{$i3->id}}">{{$i3->NameParent}}</option>
                @endforeach
            </select>
            <button class="LE2_BU">مرحله بعدی</button>
        </form>
    </div>
    <div id="LE_3">
        <h5 align="center">وضعیت</h5>
        <form id="form_New_Product3" action="" method="post">
            @csrf
            <select name="Status" id="">
                <option value="1">فعال</option>
                <option value="2">غیر فعال</option>
            </select>
            <button class="LE2_BU">مرحله بعدی</button>
        </form>
    </div>
    <div id="LE_4">
        <h5 align="center">آپلود عکس (اصلی)</h5>
        <form id="form_New_Product4" action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="Photo">
            <button class="LE2_BU">پایان</button>
        </form>

    </div>
    <div id="LE_5">
        <h5 align="center">خصوصیات و سایز</h5>
        <form style="width: 48%;float: left" id="form_New_Product5" action="" method="post">
            <h6 align="center">خصوصیات</h6>

            @csrf
            <input type="text" name="Name_K" placeholder="نام خصوصیات">
            <input type="text" name="Item_K" placeholder="خصوصیات">
            <div class="Shit_BTn">
                <button class="LE3_BU">ارسال</button>
            </div>
        </form>
        <form style="width: 48%;float: right" id="form_New_Product6" action="" method="post">
            <h6 align="center"> سایز</h6>

            @csrf
            <input type="text" name="Size" placeholder="سایز">
            <div class="Shit_BTn">
                <button class="LE3_BU">ارسال</button>
            </div>
        </form>

        <span id="LE2_BU" >بعدی</span>
    </div>
    <div id="LE_6">
        <h3 align="center">محصول شما با موفقیت اضافه شد</h3>
        <h5 style="margin: 40px;color: #585858" align="center">برای مشاهده محصول به بخش (مدریت محصولات > مشاهده کل
            محصولات) </h5>
        <div style="display: flex;align-items: center;justify-content: center">
            <span class="LE_F"><a href="{{route('ProductNewPage_admin')}}">اضافه کردن محصول جدید</a></span>
            <span class="LE_F"><a href="{{route('index_admin')}}">صفحه اصلی</a></span>
        </div>
    </div>
@endsection
