@extends('Front.Section.StepBuy')

@section('index')
    @include('Message')
    @if($TotalPrice > 0)
        <div id="Map_Buy_Product">
            <span class="off" id="Step_3">
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
            <h4 dir="rtl" align="right">لطفا یک ادرس انتخاب کنید .</h4>
            <div id="NewAddress" class="object_center">
                <button class="btnNewAddress btn_Border_Black_Bug">ادرس جدید</button>
            </div>
            <br>
            <br>
            @if($address->count() > 0)
                <div id="ViewAddress">
                    <form action="{{route('StepThreeBuyProducts')}}" method="post">
                        @csrf
                    <table class="table table-bordered">
                        <thead>
                        <tr class="active">
                            <th>انتخاب</th>
                            <th>کشور</th>
                            <th>شهر</th>
                            <th>ادرس</th>
                            <th>تلفن</th>
                            <th>کد پستی</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($address as $i)
                                <tr class="tr_table_Buy">
                                    <th>
                                        <input type="radio" id="SelectAddress" name="SelectAddress" value="{{$i->id}}">
                                    </th>
                                    <th>{{$i->State}}</th>
                                    <th>{{$i->City}}</th>
                                    <th>{{$i->address}}</th>
                                    <th>{{$i->Phone}}</th>
                                    <th>{{$i->CodePost}}</th>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                        <div class="object_center">
                            <button class="btn_BLUE_BG"> مرحله بدی و پرداخت</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        <div class="object_center_span" id="PageNewAddress">
            <p align="right">
                <i id="ClocePageNewAddress" style="cursor: pointer" class="fas fa-times"></i>
            </p>
            <form action="{{route('NewAddress')}}" method="post">
                @csrf
                <label>نام : </label>
                <input type="text" name="Name" value="{{old('Name')}}">
                <br>
                <br>
                <label>کشور : </label>
                <input type="text" name="State" value="{{old('State')}}">
                <br>
                <br>
                <label>شهر : </label>
                <input type="text" name="City" value="{{old('City')}}">
                <br>
                <br>
                <label>ادرس دقیق : </label>
                <input type="text" name="Address" value="{{old('Address')}}">
                <br>
                <br>
                <label>تلفن : </label>
                <input type="number" name="Phone" value="{{old('Phone')}}">
                <br>
                <br>
                <label>کد پستی : </label>
                <input type="number" name="CodePost" value="{{old('CodePost')}}">
                <br>
                <br>
                <div class="object_center">
                    <button class="btn_BLUE">ذخیره</button>
                </div>
            </form>
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
