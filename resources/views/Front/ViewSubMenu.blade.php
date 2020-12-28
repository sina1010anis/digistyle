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
            <h4 align="right">{!! $name !!}</h4>
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
            @if($Numebrs === 1)
                <div id="NextAndPrevPageProduct">
                    {{$products->links()}}
                </div>
            @endif
                <hr style="margin-top: 108px !important;">
            <div id="ViewProductSubMenu">
                <ul>
                @if ($products->count() == 0)
                    {{'محصولی با این مشخصات یافت نشد !'}}
                    @else
                        @foreach($products as $i)
                            @if ($i->SubMenu  == $idS)
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
                            @endif
                        @endforeach
                @endif

                </ul>
            </div>
        </span>
        <span id="PartMenuSubMenu">
            <span class="ItemSearch">
                    @error('checkboxItemChild')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">انتخاب زیر دسته</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectItemSubMenu')}}" method="get">
{{--                    @csrf--}}
                    @foreach ($ItemSubMenu as $i)
                        @if ($i->Child_id == $idS)
                            <label>{{$i->NameItem}}</label>
                            <input class="checkboxItemChild" type="checkbox" name="checkboxItemChild[]" value="{{$i->id}}">
                            <br>
                        @endif
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>

{{--@if ($idP == 16)
                <span class="ItemSearch SpanLapTopCpu">
                    @error('checkboxItemChild')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">CPU</h5>
                <hr>
                <form id="formSubMenu" action="{{route('SelectItemSubMenu')}}" method="get">
                    @csrf
                    @foreach ($AttrProductSubMenuCpu as $i)
                        @foreach($products as $is)
                            @if ($i->id_product == $is->id)
                                <label>{{$i->Item}}</label>
                                <input class="checkboxAttr" type="checkbox" name="checkboxAttr[]" value="{{$i->Item}}">
                                <br>
                            @endif

                        @endforeach
                    @endforeach
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>

            @endif--}}
             <span class="ItemSearch">
                    <i class="fas fa-chevron-right"></i>
                    <i style="transform: rotate(90deg)!important;display: none" class="fas fa-chevron-right"></i>
                    @error('checkboxAttr')
                                        <p class="ErrFilter">
                        {{$message}}
                                </p>
                    @enderror

                <h5 align="right">قیمت</h5>
                <hr>
                <form id="formSubMenu formSubMenuPrice" action="{{route('SelectPriceProduct' , $idS)}}" method="get">
                    @csrf
                    <label style="margin-top: 20px" for="price1">از (تومان) :</label>
                    <input style="text-align: center;background-color: unset;border: none" align="center" id="price1" class="inputPrice1 inputPrice1"  type="text" name="SelectPriceSlider1">
                    <label style="margin-top: 20px" for="price2">تا (تومان) :</label>
                    <input style="text-align: center;background-color: unset;border: none" align="center" id="price2" class="inputPrice2 inputPrice1"  type="text" name="SelectPriceSlider2">
                    <br>
                    <br>
                    <br>
                    <div class="slider-range"></div>
                    <br>
                    <br>
                        <button type="submit" class="btn_BLUE">اعمال تغییر</button>
                </form>
            </span>
            <script>
                    $( function() {
                        $( ".slider-range" ).slider({
                            range: true,
                            min: {{$MinPrice}},
                            max: {{$MaxPrice}},
                            values: [{{$MinPrice}},{{$MaxPrice}}],
                            slide: function( event, ui ) {
                                $( ".inputPrice1" ).val(ui.values[0]);
                                $( ".inputPrice2" ).val(ui.values[1]);
                            }
                        });
/*                        $( ".inputPrice1" ).val( $( ".slider-range" ).slider( "values", 0 ) +
                            + $( ".slider-range" ).slider( "values", 1 ) );*/

                        $( ".inputPrice1" ).val( $( ".slider-range" ).slider( "values", 0 ));
                        $( ".inputPrice2" ).val( $( ".slider-range" ).slider( "values", 1 ));
                    } );
            </script>
        </span>
    </div>
    @foreach($products as $i)
        @if ($i->SubMenu  === $idS)
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
        @endif
    @endforeach
    <div id="ViewErr"></div>
@endsection
