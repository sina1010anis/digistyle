@extends('Front.Section.IndexSubmenu')

@section('index')
    <style>
        #NextAndPrevPageProduct a {
            background-color: unset;
            border: 1px solid #e0e0e0;
        }

        #NextAndPrevPageProduct span {
            background-color: unset;
            color: #7c7c7c;
            border: 1px solid #ff5151;
        }
    </style>
    <div id="PageViewAllSubMenu">
        <span id="PartViewAllSubMenu">
            @foreach($name as $i)
                @if (isset($i->NameItem))
                    <h4 style="float: right" align="right">({{$i->NameItem}})</h4>
                @else

                @endif
            @endforeach
            <hr>
            <div id="SelectOptionProduct">
                <label for="SelectViewProduct">انتخاب بر اساس : </label>
                <select name="SelectOptionProduct" id="SelectViewProduct">
                    <option value="1" selected>محبوب ترین ها</option>
                    <option value="2">جدیدترین ها</option>
                    <option value="3">پربازدیدترین</option>
                    <option value="4">پرفروش ترین ها</option>
                    <option value="5">گرانترین ها</option>
                    <option value="6">ارزانترین ها</option>
                </select>
            </div>
            <div id="NextAndPrevPageProduct">
                {{--{{$products->links()}}--}}
            </div>
            <hr style="margin-top: 108px !important;">
            <div id="ViewProductSubMenu">
                <ul>
                @foreach($products as $i)
                        <li>
                            <a href="{{route('ViewProductOnePage' , $i->Name)}}">
                                <img class="OneImage" src="{{url('/Data_User/Image/').'/'.$i->Image}}" alt="">

                                @foreach($Images as $is)
                                    @if ($is->products_id == $i->id)
                                        <img class="TowImage" src="{{url('/Data_User/Image/Product/').'/'.$is->image}}"
                                             alt="">
                                    @endif
                                @endforeach
                                <p style="text-align:right;margin-right: 20px">{{$i->Name}}</p>
                                <p>{{$i->NameCategory}}</p>
                                <p>{{$i->NameItem}}</p>
                                <p style="color: #008000"> {{$i->Price}} تومان </p>
                                <hr>
                                <p style="margin: 0 10px;direction: rtl;text-align: center">{!! mb_substr($i->DE , 0 , 50) , '...' !!}</p>
                            </a>
                                                                                        <span id="{{$i->id}}"
                                                                                              class="BackIconZoom">
                                    <i class="fas fa-search"></i>
                                </span>
                                                            <div
                                                                style="  display: flex;margin-top: 10px;justify-content: space-around;">

                                                            @foreach($sizes as $size)
                                                                    @if ($size->products_id === $i->id)

                                                                        <span class="ViewSize">{{$size->size}}</span>

                                                                    @endif
                                                                @endforeach
                                                                </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </span>
        {{$idS}}
        <?php
        if (!isset($_GET['checkboxAttrGpu']) or !isset($_GET['checkboxAttrGpu'])) {
            ?>



        <span id="PartMenuSubMenu">
            <span class="ItemSearch">
                                    <i class="fas fa-chevron-right"></i>

                <i style="transform: rotate(90deg)!important;display: none" class="fas fa-chevron-right"></i>
                    @error('checkboxItemChild')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">انتخاب زیر دسته</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectItemSubMenu')}}" method="get">
                    @foreach ($ItemSubMenu as $i)
                        @if ($i->Child_id == $idS)
                            <label for="{{$i->NameItem}}">{{$i->NameItem}}</label>
                            <input id="{{$i->NameItem}}" class="checkboxItemChild" type="checkbox" name="checkboxItemChild[]"
                                   value="{{$i->id}}">
                            <br>
                        @endif
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>
<?php } ?>
                    @if ($idP == 16)
            <span class="ItemSearch SpanLapTopCpu">
                <i class="fas fa-chevron-right"></i>
                <i style="transform: rotate(90deg)!important;display: none" class="fas fa-chevron-right"></i>
                    @error('checkboxAttr')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">CPU</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectAttrMenu')}}" method="get">
                    @foreach ($AttrProductSubMenuCpu as $i)
                        @foreach($products as $is)
                            @if ($i->id_product == $is->id)
                                <label for="{{$i->Item}}">{{$i->Item}}</label>
                                <input id="{{$i->Item}}" class="checkboxAttr" type="checkbox" name="checkboxAttr[]" value="{{$i->Item}}">
                                <br>
                            @endif

                        @endforeach
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>


                <span class="ItemSearch SpanLapTopGpu">
                    <i class="fas fa-chevron-right"></i>
                    <i style="transform: rotate(90deg)!important;display: none" class="fas fa-chevron-right"></i>
                    @error('checkboxAttrGpu')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">کارت گرافیک</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectAttrMenuGpu')}}" method="get">
                    @foreach ($AttrProductSubMenuGpu as $i)
                        @foreach($products as $is)
                            @if ($i->id_product == $is->id)
                                <label for="{{$i->Item}}">{{$i->Item}}</label>
                                <input id="{{$i->Item}}" class="checkboxAttr" type="checkbox" name="checkboxAttrGpu[]" value="{{$i->Item}}">
                                <br>
                            @endif

                        @endforeach
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>

            @endif


            @if ($idP == 15)
                <span class="ItemSearch SpanGifCardTime">
                    <i class="fas fa-chevron-right"></i>
                    <i style="transform: rotate(90deg)!important;display: none" class="fas fa-chevron-right"></i>
                    @error('checkboxAttr')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">زمان</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectAttrMenu')}}" method="get">
                    @foreach ($ItemSubMenuGifCart as $i)
                        @foreach($products as $is)
                            @if ($i->id_product == $is->id)
                                <label for="{{$i->Item}}">{{$i->Item}}</label>
                                <input id="{{$i->Item}}" class="checkboxAttr" type="checkbox" name="checkboxAttr[]" value="{{$i->Item}}">
                                <br>
                            @endif

                        @endforeach
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>

            @endif
        </span>
    </div>

    @foreach($products as $i)
        <div class="ViewProductM ViewProductM{{$i->id}}">
            <i style="z-index: 20;" class="fas fa-times"></i>
            <div class="ViewImageSlidOneProductM center">
                @foreach ($Images2 as $iM)
                    @if ($iM->products_id === $i->id)
                        <img width="300px" height="300px" src="{{url('/Data_User/Image/Product/').'/'.$iM->image}}"
                             alt="">
                    @endif
                @endforeach
            </div>
            <hr>
            <p class="NameProductOneM">نام محصول : {{$i->Name}}</p>
            <p class="BrandProductOneM">برند محصول : {{$i->NameCategory}}</p>
            <p class="ItemProductOneM">زیر منو محصول : {{$i->NameItem}}</p>
            <label>سایز : </label>
            <select name="SizeOneProductM" id="">
                @foreach($sizes as $size)
                    @if ($size->products_id == $i->id)
                        <option>{{$size->size}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <br>
            <p class="PriceProductOneM">قیمت محصول : {{$i->Price}}تومان</p>
            <a style="cursor: pointer;color: white!important;" class="btn_RED">اضافه به سبد خرید</a>
            <a style="cursor: pointer;" class="btn_ALERT btn_ALERT_PriceProductOneM">توضیحات بیشتر</a>
        </div>
    @endforeach
    <div id="ViewErr"></div>
@endsection
