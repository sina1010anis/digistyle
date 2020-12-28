@extends('Front.Section.IndexSubmenu')

@section('index')
    @include('Message')
    <div id="Page-A-One-Product">
        <div class="owl-carousel" id="View-Slider-Product-One">
            <img src="{{url('Data_User/Image').'/'.$id->Image}}" alt="">
            @foreach($Image as $i)
                <img src="{{url('Data_User/Image/Product').'/'.$i->image}}" alt="">
            @endforeach
        </div>
        <br>
        <br>
        <span id="Name-A" align="right">{{$id->Name}}</span>
        <i class="fas fa-share-alt"></i>
        <hr>
        <div id="SelectOptionProductOneProduct">
            <label for="SelectViewProduct">انتخاب سایز : </label>
            <select name="SelectOptionProduct" id="SelectViewProduct">
                @foreach($sizes as $i)
                    <option value="{{$i->id}}">{{$i->size}}</option>
                @endforeach
            </select>
        </div>
        <span id="Price-A" align="right">قیمت : {{$id->Price}} تومان </span>
        <hr>
        <p dir="rtl" style="font-size:20px" align="right">توضیحات : </p>
        <p class="Text-DE-Product-One">
            {{$id->DE}}
        </p>
        <hr>
        @auth()
            <a href="{{route('SaveProductCart' , $id->id)}}" class="btn-plus-carts-product">اضافه به کارت <i class="fas fa-shopping-basket"></i> </a>
        @endauth
        <a class="btn-plus-like-produst" href=""><i class="far fa-heart"></i></a>
        <span class="Onb-Product-One">
            <span> تحویل در عرض 7 روزکاری <i class="far fa-clock"></i></span>
            <span> بازگشت محصول در 7 روزه <i class="far fa-tired"></i></span>
            <span> ضمانت اصل بودن کالا <i class="far fa-copyright"></i></span>
        </span>
    </div>

    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:50,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:false
                },
                1000:{
                    items:3,
                }
            }
        })
    </script>
    <div id="Btn-Top-Panel-Pne_product">
        <div id="Btn-View-Attr">
            مشخصات
        </div>
        <div id="Btn-View-Message">
            نظرات
        </div>
    </div>
    <div id="Top-Panel-Pne_product-Attr">
        <table align="center" class="table">
            @foreach($attr as $i)
                <tr align="center">
                    <th>{{$i->Item}}</th>
                    <th>{{$i->Name}}</th>
                </tr>
            @endforeach
        </table>
    </div>
    <div id="Top-Panel-Pne_product-Message">
        <ul>
            @foreach($comments as $i)
            <li  class="Message-One_product_User">
                <span class="Name-User-Send-Message-One-Product" dir="rtl">
                    نام فرستنده : {{$i->Name}}
                </span>
                <span class="Data-User-Send-Message-One-Product" dir="rtl">
                    زمان ارسال : {{jdate($i->created_at)->format('%B %d، %Y')}}
                </span>
                <p class="MT-One-Product">
                    {{$i->Text}}
                </p>
                <a class="Send-Message-One-Product" style="cursor: pointer">پاسخ</a>
                <br>
                <br>
                <br>
                <form action="{{route('NewCommentProductsSend' , $i->id , $id->id)}}" method="post">
                    @csrf
                    <label for="Name-New-Message-One_Product">نام کاربری : </label>
                    <input style="background: white" id="Name-New-Message-One_Product" type="text" name="Name" placeholder="نام کاربری">
                    <br>
                    <br>
                    <label for="Text-New-Message-One_Product">متن پیام : </label>
                    <textarea id="Text-New-Message-One_Product" name="Text" placeholder="متن پیام"></textarea>
                    <br>
                    <br>
                    <div class="object_center">
                        <button class="btn_BLUE" type="submit">ارسال</button>
                    </div>
                </form>
                <ul>
                    @foreach($commentsSend as $ii)
                        @if($ii->parent_id === $i->id)
                            <li class="Message-One_product_Sender">
                        <span class="Name-User-Send-Message-One-Product">
        پاسخ به پیام <i class="fas fa-arrow-up"></i>

                        </span>
                                <span class="Name-User-Send-Message-One-Product-Sender" dir="rtl">
                            نام فرستنده : {{$ii->Name}}
                        </span>
                                <p class="MT-One-Product">
                                    {{$ii->Text}}
                                </p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
        @if(auth()->check())
            <div id="View-Form-New-Message-One-Product">
                <form action="{{route('NewCommentProducts' , $id->id)}}" method="post">
                    @csrf
                    <label for="Name-New-Message-One_Product">نام کاربری : </label>
                    <input id="Name-New-Message-One_Product" type="text" name="Name" placeholder="نام کاربری">
                    <br>
                    <br>
                    <label for="Text-New-Message-One_Product">متن پیام : </label>
                    <textarea id="Text-New-Message-One_Product" name="Text" placeholder="متن پیام"></textarea>
                    <br>
                    <br>
                    <label for="MyBuyPoduct">این محصول را خریداری کردم</label>
                    <input id="MyBuyPoduct" type="radio" name="BuyPoduct" value="1">
                    <br>
                    <label for="NotBuyPoduct">هنوز این محصول را خریداری نکردم</label>
                    <input id="NotBuyPoduct" type="radio" name="BuyPoduct" value="0">
                    <div class="object_center">
                        <button class="btn_BLUE" type="submit">ارسال</button>
                    </div>
                </form>
            </div>
        @else
            <div id="Err-Aath">
                <p>
                    {{'برای ثبت دیدگاه ، لطفا وارد شود'}}
                </p>
            </div>
        @endif

    </div>
    <style>
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            padding: 30px!important;
        }
    </style>
    <div>
        <div style="margin: auto;position: relative" id="ViewAllProduct">
            <h4 align="right">کالا های مربوط</h4>
            <hr>
            <ul style="margin: 0;padding: 0" id="UlViewAllProduct" class="owl-carousel">
                @foreach($ProductAll as $i)
                    @if($i->SubMenu == $id->SubMenu)
                        <li>
                            <a href="{{route('ViewProductOnePage' , $i->Name)}}">
                                <img width="100%" height="175px" src="{{url('/Data_User/Image/').'/'.$i->Image}}" alt="">
                                @foreach($ProductOff as $io)
                                    @if ($io->id_product == $i->id)
                                        <span
                                            style="position:absolute;border-radius: 100px;padding: 5px 10px ; background-color: red;color: whitesmoke">{{$io->NumberOff}}%</span>
                                    @endif
                                @endforeach
                                <p align="center">{{$i->Name}}</p>
                                <p align="center">{{$i->Price}}تومان </p>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <span id="BtnNext" class="BtnNextAndPrev"><i class="fas fa-chevron-left"></i></span>
            <span id="BtnPrev" class="BtnNextAndPrev"><i class="fas fa-chevron-right"></i></span>
        </div>
    </div>
    @include('Front.Section.Footer')
@endsection

