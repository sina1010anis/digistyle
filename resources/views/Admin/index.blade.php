@extends('Admin.Section.index-page')

@section('index')
    <?php
    if (session('msg')) {
        echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
    }
    ?>
    <div id="View_Set">
            <span>
                <p  align="center">
                    <i  class="fas fa-users View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    کابران فعال
                </p>
                <p class="View_SET_P" align="center">
                    {{$users->count()}}
                </p>
            </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-shopping-cart View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    سفارشات
                </p>
                <p class="View_SET_P" align="center">
                    {{$order->count()}}
                </p>
        </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-comment-dots View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    پیام های خصوصی
                </p>
                <p class="View_SET_P" align="center">
                    20
                </p>
        </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-money-bill-alt View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    درامد
                </p>
                <p class="View_SET_P" align="center">
                    {{$ShitTotalPriceToWebSit}}
                </p>
        </span>
    </div>
    <div id="myChart"></div>
    <div class="View_Table_Panel_admin" id="View_Comments" dir="rtl">
        <h3 align="center">نظرات کاربران</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>متن</th>
                <th>فرزند</th>
                <th>تاریخ</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comment as $i)
                <tr>
                    <td align="left">{{$i->id}}</td>
                    <td  align="left">{{$i->Name}}</td>
                    <td title="{{$i->Text}}" align="left">
                        <?php
                        echo mb_substr($i->Text , 0 , 20) , '...';
                        ?>
                    </td>
                    @if($i->parent_id == 0)
                        <td style="color: green" align="left">متن اصلی</td>
                    @else
                        <td  align="left">{{$i->parent_id}}</td>
                    @endif
                    <td  align="left">{{jdate($i->created_at)}}</td>
                    @if($i->Status ==0)
                        <td  align="left">
                            <a class="btn_GREEN" href="{{route('EditCommentsProducts_admin' , $i->id)}}">
                            نمایش بده
                            </a>
                        </td>
                    @else
                        <td  align="left">
                            <a class="btn_RED" href="{{route('EditCommentsProducts_admin' , $i->id)}}">
                                نمایش بده
                            </a>
                        </td>
                    @endif
                    <td  align="left">برای محصولات</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="View_Table_Panel_admin" id="View_Orders" dir="rtl">
        <h3 align="center">سفارشات موفق</h3>
        <table  class="table table-hover">
            <thead>
            <tr>
                <th>ایدی</th>
                <th>نام کاربری</th>
                <th>کد بانک</th>
                <th>نام</th>
                <th>جمع کل فاکتور</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $i)
                <tr>
                    <th>{{$i->id}}</th>
                    <th><a href="{{route('ProductViewOne_admin' , auth()->user()->Name)}}">{{auth()->user()->Name}}</a></th>
                    <th>{{$i->CodeBank}}</th>
                    <th>{{$i->Name}}</th>
                    <th>{{$i->TotalPrice}}</th>
                    <th><a href="{{route('ViewOredersOneUser_admin' , $i->id)}}" class="btn_ORANGE" >جزیات</a></th>
                    @if ($i->SendProduct == 0)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' ,$i->id)}}" class="btn_BLUE" style="color: #ffffff!important;font-size: 12px">برسی > اماده سازی</a>
                        </th>
                    @endif
                    @if ($i->SendProduct == 1)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' , $i->id)}}" class="btn_BLUE" style="color: #ffffff!important;font-size: 12px">  اماده سازی > تحویل پست</a>
                        </th>
                    @endif
                    @if ($i->SendProduct ==2)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' , $i->id)}}" class="btn_BLUE" style="color: #ffffff!important;font-size: 12px">   تحویل پست > دریافت پست</a>
                        </th>
                    @endif
                    @if ($i->SendProduct ==3)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' , $i->id)}}" class="btn_BLUE" style="color: #ffffff!important;font-size: 12px">  دریافت پست > ارسال</a>
                        </th>
                    @endif
                    @if ($i->SendProduct ==4)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' , $i->id)}}" class="btn_BLUE" style="color: #ffffff!important;font-size: 12px"> ارسال > تحویل داد</a>
                        </th>
                    @endif
                    @if ($i->SendProduct ==5)
                        <th>
                            <a class="btn_GREEN" style="color: #ffffff!important;font-size: 12px"> تحویل داده شده</a>
                        </th>
                    @endif
                    @if ($i->Status === 200)
                        <th style="color: green">پرداخت شده</th>
                    @else
                        <th style="color: #ff2e2e">پرداخت نشده یا پرداخت با مشکل مواجه شده</th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        zingchart.render({
            id: 'myChart',
            data: {
                type: 'line',
                series: [
                    @foreach($ordersZing as $i)
                    { values: [
                            {{$i->id_user}},
                            {{$i->sums}},
                        ] },
                        @endforeach

                ]

            }
        });
    </script>
@endsection
