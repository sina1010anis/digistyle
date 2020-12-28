@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_New_Category">
        <i id="icon_page_tree" title="نمایش دسته ها و زیر دسته ها" class="fas fa-tree"></i>
        <?php
        if (session('msg')) {
            echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
        }
        ?>
        @error('NameParent')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        @error('NameCategory')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        @error('NameItem')
        <div align="center" style="width: 100%;padding: 5px;background-color: #ff6363;color: white">{{$message}}</div>
        @enderror
        <span id="Shit_New_Category_Part1">
            <h4 align="center">منو اصلی</h4>
            <br><br>
            <form action="{{route('parentCategory_admin')}}" method="post">
                @csrf
                <input type="text" name="NameParent" placeholder="نام دسته اصلی">

                <button type="submit">ذخیره</button>
            </form>
        </span>
        <span id="Shit_New_Category_Part2">
            <h4 align="center">زیر مجموعه</h4>
            <br><br>
            <form action="{{route('ChildCategory_admin')}}" method="post">
                @csrf
                <input type="text" name="NameCategory" PLACEHOLDER="زیر دسته">
                <select name="Parent_id" id="">
                    @foreach($dataS as $i)
                        <option value="{{$i->id}}">{{$i->NameParent}}</option>
                    @endforeach
                </select>
                <button type="submit">ذخیره</button>
            </form>
        </span>
        <span id="Shit_New_Category_Part3">
            <h4 align="center">زیر دسته</h4>
            <br><br>
            <form action="{{route('ItemChildCategory_admin')}}" method="post">
                @csrf
                <input type="text" name="NameItem" PLACEHOLDER="زیر دسته">
                <select name="Child_id" id="">
                    @foreach($ItemCategory as $i)
                        <option value="{{$i->id}}">{{$i->NameCategory}}</option>
                    @endforeach
                </select>
                <button type="submit">ذخیره</button>
            </form>
        </span>
        <i id="Show_Hide_Shit_A" class="fas fa-chevron-down"></i>
        <i id="Show_Hide_Shit_B" class="fas fa-chevron-up"></i>
        <div id="Shit_Delete_Category_PAD">
            <h4 align="center">ویرایش دسته</h4>
            <div style="display: flex;align-items: center;justify-content: center">
                <span class="btn_set" id="btn_Parent">منو اصلی</span>
                <span class="btn_set" id="btn_Child">زیر مجموعه</span>
                <span class="btn_set" id="btn_Item">زیر دسته</span>
            </div>
            <div class="T_input_Shit_Delete_Category_PAD" id="P_T_input_Shit_Delete_Category_PAD">
                <h5 align="center">منو اصلی</h5>
                <form action="{{route('EditParentCategory_admin')}}" method="post">
                    @csrf
                    <select name="ID" id="">
                        @foreach($dataS as $i)
                            <option value="{{$i->id}}">{{$i->NameParent}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="Text_Edit" class="Text_Edit" placeholder="متن جدید">
                    <button type="submit">ذخیره</button>
                </form>
            </div>

            <div class="T_input_Shit_Delete_Category_PAD" id="C_T_input_Shit_Delete_Category_PAD">
                <h5 align="center">زیر مجموعه</h5>
                <form action="{{route('EditChildCategory_admin')}}" method="post">
                    @csrf
                    <select name="ID" id="">
                        @foreach($ItemCategory as $i)
                            <option value="{{$i->id}}">{{$i->NameCategory}}</option>
                        @endforeach
                    </select>
                    <input type="text" id="Text_Edit" name="Text_Edit" class="Text_Edit" placeholder="متن جدید">
                    <button type="submit">ذخیره</button>
                </form>
            </div>

            <div class="T_input_Shit_Delete_Category_PAD" id="I_T_input_Shit_Delete_Category_PAD">
                <h5 align="center">زیر دسته</h5>
                <form action="{{route('EditItemCategory_admin')}}" method="post">
                    @csrf
                    <select name="ID" id="">
                        @foreach($ItemItem as $i)
                            <option value="{{$i->id}}">{{$i->NameItem}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="Text_Edit" name="Text_Edit" placeholder="متن جدید">
                    <button type="submit">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
    <div id="Page_Tree_Category">
        <i id="icon_page_close" class="fas fa-times"></i>

        @foreach($ItemParent as $i)
            <div style="padding:5px;box-sizing:border-box;background-color: #eaeaea" id="P_Item_View"><p align="right"><b><a style="color:red;text-decoration: none" href="{{route('ParentDeleteCategory_admin' , $i->id)}}"> <i class="fas fa-trash-alt"></i> </a> {{$i->NameParent}}</b>
                @foreach($ItemCategory as $is)
                    @if($is->Parent_id == $i->id)
                        <p align="right" style="color: #0087ff;margin-right: 20px;font-size: 13px">
                            <a style="color:#0087ff;text-decoration: none" href="{{route('ChildDeleteCategory_admin' , $is->id)}}"> <i class="fas fa-trash-alt"></i> </a> {{$is->NameCategory}}
                            @foreach($ItemItem as $isd)
                                @if($isd->Child_id == $is->id)
                                    <p align="right" style="color: #35ab0a;margin-right: 40px;font-size: 13px">
                                    <a style="color:#35ab0a;text-decoration: none" href=""> <i class="fas fa-trash-alt"></i> </a> {{$isd->NameItem}}
                                @endif
                            @endforeach
                        </p>
                    @endif
                @endforeach
            </p>
            </div>
        @endforeach

    </div>
    <div id="Page_To_Page"></div>
@endsection
