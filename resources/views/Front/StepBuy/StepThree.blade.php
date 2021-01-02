@extends('Front.Section.StepBuy')

@section('index')
    @include('Message')
    @if($TotalPrice > 0)
        <div id="Map_Buy_Product">
            <span id="Step_3">
                <p>
                    تایید پرداخت
                </p>
            </span>
            <span id="Step_2">
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
        <div id="countinerClass">
            @foreach($CartsUser as $i)
                @foreach($Products as $ii)
                    @if($ii->id == $i->Product_id)
                        <div style="position: relative;margin-top: 20px" class="object_center ImeBuyFdiv">
                            <img class="ImeBuyF" src="{{url('Data_User/Image') . '/' . $ii->Image}}" alt="">
                            <span class="DecAzImgBuyF">
                                <h4 align="center"><b>{{$ii->Name}}</b></h4>
                                <h5 align="center">قیمت : {{$ii->Price}}</h5>
                                <h5 align="center">تعداد : {{$i->Number}}</h5>
                                <h5 align="center">قیمت کل : {{$i->Price}}</h5>
                            </span>
                        </div>
                    @endif
                @endforeach
            @endforeach
                <br>
                <br>
                <br>
                <table  class="border_bl table table-hover">
                    <tr>
                        <th class="al_le">{{$TotalPrice}}</th>
                        <th class="al_ri">قیمت کالا محصولات</th>
                    </tr>
                    <tr>
                        <th class="al_le">{{$TotalProductsSend}}</th>
                        <th class="al_ri">هزینه ارسال</th>
                    </tr>
                    <tr>
                        <th class="al_le">{{$TotalPriceF}}</th>
                        <th class="al_ri">قیمت تمام شده</th>
                    </tr>
                </table>
            <div class="object_center">
                <a href="{{route('requestBuy')}}" class="btn_BLUE_BG">پرداخت</a>
            </div>
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
