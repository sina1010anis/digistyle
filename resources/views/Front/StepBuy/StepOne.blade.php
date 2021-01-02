@extends('Front.Section.StepBuy')

@section('index')
    @if($TotalPrice > 0)
        <div id="Map_Buy_Product">
            <span class="off" id="Step_3">
                <p>
                    تایید پرداخت
                </p>
            </span>
            <span class="off" id="Step_2">
                <p>
                اطلعات ارسال
                </p>
            </span>
            <span id="Step_1">
                <p>
                    کارت
                </p>
            </span>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th>مشخصات محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>جمع قیمت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($CartsUser as $i)
                <tr class="tr_table_Buy">
                    <th style="display: flex;align-items: center;justify-content: center">
                        @foreach($Products as $ii)
                            @if($ii->id === $i->Product_id)
                                <img src="{{url('Data_User/Image').'/'.$ii->Image}}" alt="">
                            @endif
                        @endforeach
                    </th>
                    <th>
                        <p>تعداد : {{$i->Number}} عدد</p>
                    </th>
                    <th>
                        @foreach($Products as $ii)
                            @if($ii->id === $i->Product_id)
                                <p class="One_Price">قیمت : <span>{{$ii->Price}}</span> تومان</p>
                            @endif
                        @endforeach
                    </th>
                    <th>
                        <p class="Total_Price">قیمت : <span>{{$i->Price}}</span> تومان</p>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div id="TotalAllProducts">
                مبلغ محصولات : <span class="{{$TotalPrice}}"></span> تومان
            </div>
            <script>
                function number_3_3(num, sep) {
                    var number = typeof num === "number" ? num.toString() : num,
                        separator = typeof sep === "undefined" ? ',' : sep;
                    return number.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1" + separator);
                }
                (function () {
                    var price_DE = $('#TotalAllProducts span').attr('class');
                    var s = number_3_3(price_DE, ',');
                    $('#TotalAllProducts span').text(s);
                })();
            </script>
        <div class="object_center">
            <a href="{{route('SelectAddressBuyStepTow')}}" class="btn_BLUE_BG">پرداخت</a>
        </div>
    @else
        <div class="object_center" id="Err_Buy">
            <img src="{{url('Data_User/Image/Icon/basket.png')}}" alt="">
            <h2>
                ! کارت شما خالی است
            </h2>
        </div>
    @endif
@endsection
