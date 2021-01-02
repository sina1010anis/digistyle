@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_View_Brand">
        <?php
        if (session('msg')) {
            echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
        }
        ?>
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
            @foreach($orders as $i)
                <tr>
                    <th>{{$i->id}}</th>
                    <th><a href="{{route('ProductViewOne_admin' , auth()->user()->Name)}}">{{auth()->user()->Name}}</a></th>
                    <th>{{$i->CodeBank}}</th>
                    <th>{{$i->Name}}</th>
                    <th>{{$i->TotalPrice}}</th>
                    <th><a href="{{route('ViewOredersOneUser_admin' , $i->id)}}" class="btn_ORANGE" >جزیات</a></th>
                    @if ($i->SendProduct == 0)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' ,$i->id)}}" class="btn_BLUE" style="color: #ffffff!important;">برسی > اماده سازی</a>
                        </th>
                    @endif
                    @if ($i->SendProduct == 1)
                        <th>
                            <a href="{{route('EditSendStatusProducts_admin' , $i->id)}}" class="btn_BLUE" style="color: #ffffff!important;">  اماده سازی > تحویل پست</a>
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
        {{$orders->links()}}
    </div>
@endsection
