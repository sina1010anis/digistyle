@extends('User.Section.index')

@section('MenuUser')
    <div id="ViewOrderUserPanelOne">
        <table class="table">
            <tr>
                <th>کد سفارش</th>
                <th>کد تراکنش</th>
            </tr>
            @foreach($ordersViewOrders as $i)
                <tr>
                    <th>{{$i->id}}</th>
                    <th>
                        <a class="ViewOrderBTN" id="{{$i->id}}">
                            {{$i->CodeBank}}
                        </a>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>

        @foreach($ordersViewOrders as $i)
            <div class="object_center_span ViewRSOrders" id="ViewRSOrders{{$i->id}}">
                <p>نام خریدار : {{$i->Name}}</p>
                <p>نام کاربر : {{auth()->user()->Name}}</p>
                <p>ایمیل خریدار : {{$i->Email}}</p>
                <p>موبایل خریدار : {{$i->Mobile}}</p>
                <hr>
                <p>کد تراکنش : {{$i->CodeBank}}</p>
                <p>قیمت کل : {{$i->TotalPrice}}</p>
                @if($i->Status == 0)
                    <p class="btn_BLUE">وضعیت پرداخت : {{'پرداخت نشده'}}</p>
                @endif
                @if($i->Status == 200)
                    <p class="btn_GREEN">وضعیت پرداخت : {{'با موفقیت پرداخت شده'}}</p>
                @endif
                @if($i->Status == 404)
                    <p class="btn_RED">وضعیت پرداخت : {{'پرداخت با خطا مواجه شده'}}</p>
                @endif
                <hr>
                <?php
                $NameProdcuts = $i->Orders;
                $arr = json_decode($NameProdcuts, true);
                foreach ($arr as $ii) {
                    //echo $ii['Product_id'].'<br>';
                    foreach ($products as $iii){
                        if ($ii['Product_id'] == $iii->id){
                            echo $iii->Name.'<br>';
                        }
                    }
                }
                ?>
                <hr>
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
            </div>
        @endforeach

@endsection
