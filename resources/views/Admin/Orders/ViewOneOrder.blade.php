@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_Show_User">
        @foreach($order as $orders)
        <h4>ایدی سفارش : {{$orders->id}}</h4>
        <hr>
        <p> نام کاربری : {{ auth()->user()->Name }} </p>
        <p> نام ثبت شده : {{ $orders->Name }} </p>
        <p> شماذه موبایل : {{ $orders->Mobile }} </p>
        <p> ایمیل : {{ $orders->Email }} </p>
        <hr>
        @if($orders->CodeBank !== 0)
            <p style="color: green">شماره تراکنش : {{ $orders->CodeBank }} </p>
        @else
            <p style="color: red">شماره تراکنش : {{ 'پرداخت نشده' }} </p>
        @endif
        <p>جمع کل فاکتور : {{ $orders->TotalPrice }} </p>
        <p> ادرس :
            <table class="table">
            <tr>
                <th>کشور</th>
                <th>شهر</th>
                <th>ادرس دقیق</th>
                <th>تلفن</th>
                <th>کد پستی</th>
            </tr>
            <tr>
                <th>{{$orders->State}}</th>
                <th>{{$orders->City}}</th>
                <th>{{$orders->address}}</th>
                <th>{{$orders->Phone}}</th>
                <th>{{$orders->CodePost}}</th>
            </tr>
        </table>
        </p>
        <?php
            foreach ($order as $i) {
                $NameProdcuts = $i->Orders;
                $arr = json_decode($NameProdcuts, true);
                foreach ($arr as $ii) {
                    //echo $ii['Product_id'].'<br>';
                    foreach ($productsOrderUser as $iii){
                        if ($ii['Product_id'] == $iii->id){
                            echo $iii->Name.'<br>';
                        }
                    }
                }
            }
        ?>
        <?php
        if ($orders->SendProduct == 0){
            echo ' <p> وضعیت ارسال : در حال برسی</p>';
        }elseif ($orders->SendProduct == 1){
            echo ' <p> وضعیت ارسال : در حال اماده سازی</p>';
        }        if ($orders->SendProduct == 2){
            echo ' <p> وضعیت ارسال : در حال تحویل به پست</p>';
        }elseif ($orders->SendProduct == 3){
            echo ' <p> وضعیت ارسال : در یافت شده توسط پست</p>';
        }elseif ($orders->SendProduct == 4){
            echo ' <p> وضعیت ارسال : در حال ارسال به سمت مشتری</p>';
        }
        elseif ($orders->SendProduct == 5){
            echo ' <p> وضعیت ارسال : دریافت شده</p>';
        }
        ?>

    </div>
    @endforeach
@endsection
