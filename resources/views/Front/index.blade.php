@extends('Front.Section.index')

@section('index')
    <div>
        <div style="margin: auto;position: relative" id="ViewAllProduct">
            <h4 align="right">نمایش همه کالا ها</h4>
            <hr>
            <ul style="margin: 0;padding: 0" id="UlViewAllProduct" class="owl-carousel">
                @foreach($ProductAll as $i)
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
                @endforeach
            </ul>
            <span id="BtnNext" class="BtnNextAndPrev"><i class="fas fa-chevron-left"></i></span>
            <span id="BtnPrev" class="BtnNextAndPrev"><i class="fas fa-chevron-right"></i></span>
        </div>
    </div>
    <h4 style="margin-top: 60px" align="center">خرید خاص از ما</h4>
    <hr>
    <div id="ShitViewUsp">
        <div id="ViewUsp">
            <span>
                <span style="padding: 30px ; box-sizing: border-box" class="ViewImage">
                    <div>
                        پرداخت مطمعن
                        <img src="{{url('Data_User/Image/Icon/original.png')}}" alt="">
                    </div>
                    <p style="margin-top: 25px" align="center">
                                                    یک پرداخت پر از لذت را با ایران شاپ تجربه کنید همراه با بهترین تخفیفات روز و بدون مناسبت را فقط با ایران شاپ تجربه کنید
                    </p>
                </span>
            </span>
            <span>
                <span style="padding: 30px ; box-sizing: border-box" class="ViewImage">
                    <div>
                        ارسال سریع
                        <img src="{{url('Data_User/Image/Icon/freeDelivery.png')}}" alt="">
                    </div>
                    <p style="margin-top: 25px" align="center">
                                                    یک پرداخت پر از لذت را با ایران شاپ تجربه کنید همراه با بهترین تخفیفات روز و بدون مناسبت را فقط با ایران شاپ تجربه کنید
                    </p>
                </span>
            </span>
            <span>
                <span style="padding: 30px ; box-sizing: border-box" class="ViewImage">
                    <div>
                        تخفیف هفتگی
                        <img src="{{url('Data_User/Image/Icon/7days.png')}}" alt="">
                    </div>
                    <p style="margin-top: 25px;line-height: 20px" align="center">
                                                    یک پرداخت پر از لذت را با ایران شاپ تجربه کنید همراه با بهترین تخفیفات روز و بدون مناسبت را فقط با ایران شاپ تجربه کنید
                    </p>
                </span>
            </span>
        </div>
    </div>
    <h4 style="margin-top: 60px" align="center">گروه اجتماعی ما</h4>
    <hr>
    <div id="ShitViewUsp">
        <div id="ViewUsp">
    <span>
                <span style="padding: 30px ; box-sizing: border-box" class="ViewImage">
                    <div>
                        کانل تلگرام ما
                        <img src="{{url('Data_User/Image/Icon/telegram.png')}}" alt="">
                    </div>
                    <p style="margin-top: 25px" align="center">
                                                    یک پرداخت پر از لذت را با ایران شاپ تجربه کنید همراه با بهترین تخفیفات روز و بدون مناسبت را فقط با ایران شاپ تجربه کنید
                    </p>
                </span>
            </span>
            <span>
                <span style="padding: 30px ; box-sizing: border-box" class="ViewImage">
                    <div>
                        گروه ایستاگرام
                        <img src="{{url('Data_User/Image/Icon/instagram.png')}}" alt="">
                    </div>
                    <p style="margin-top: 25px" align="center">
                                                    یک پرداخت پر از لذت را با ایران شاپ تجربه کنید همراه با بهترین تخفیفات روز و بدون مناسبت را فقط با ایران شاپ تجربه کنید
                    </p>
                </span>
            </span>
        </div>
    </div>
    <h4 style="margin-top: 60px" align="center">برند ها موجود</h4>
    <hr>

    <div style="margin: auto;position: relative" id="ViewAllProduct">
        <ul style="margin: 0;padding: 0" id="UlViewAllBrand" class="owl-carousel">
            @foreach($AllBrand as $i)
                <li>
                        <a style="width: 100%;height: 100%" href="">
                            <img width="100%" height="175px" src="{{url('/Data_User/Image/Brand').'/'.$i->Image}}" alt="">
                        </a>
                </li>
            @endforeach
        </ul>
        <span id="BtnNext" class="BtnNextAndPrev"><i class="fas fa-chevron-left"></i></span>
        <span id="BtnPrev" class="BtnNextAndPrev"><i class="fas fa-chevron-right"></i></span>
    </div>
    <hr>
    <div id="ViewNam">
        <span id="ViewImgNma">
            <img src="{{url('/Data_User/Image/Brand/enamad.PNG')}}" alt="">
            <img src="{{url('/Data_User/Image/Brand/samandehi.PNG')}}" alt="">
        </span>
        <h4 align="right">نماد های قابل اطمینان</h4>
        <hr>
        <span id="ViewTextNma">
            <p style="line-height: 30px;margin-right: 25px" dir="rtl" align="right">
                				  		فروشگاه اینترنتی دیجی استایل که یک تجربه منحصربه فرد بعد از دیجی کالا است، یکی از بزرگ ترین و جامع ترین مراکز آنلاین عرضه پوشاک با کیفیت است. در دیجی استایل تمامی کالاهای مرتبط با پوشش، با کیفیتی مطلوب و کم¬نظیر و با قیمتی مناسب ارائه می¬شود. تیم دیجی استایل تمام تلاش خود را کرده است تا محصولاتی را که به مشتریان عرضه می¬کند، علاوه بر تناسب با معیارهای ایرانی و اسلامی، زیبایی و اصالت را هم به همراه داشته باشد. تمامی محصولات این سایت از جمله لباس، کفش، زیورآلات، لوازم آرایش و سلامت، در نهایت دقت و با تلاش متخصصان تیم دیجی استایل انتخاب شده و در اختیار خریداران قرار گرفته اند. یکی از اهداف اصلی فروشگاه اینترنتی مد و لباس دیجی استایل در کنار برطرف کردن نیاز خرید لباس و خرید کفش و اکسسوری، سریع و مطمئن اینترنتی، معرفی و عرضه کالاهای فاخر ایرانی با کیفیتی کم نظیر و طراحی به روز است. در این راستا سعی شده تا با فروش محصولات تولید داخل کشور مانند اناربن، خانه مد راد، هورشید، تچر، پانیسا، مکث، پاتن چرم، آر ان اس، شهر چرم، هاترا، گالری آرتمیس، چرم مشهد، آنو جین و... در این سایت خریدی مطمئن در کمترین زمان برای خریداران تضمین شود. در کنار تمام محصولات ایرانی شناخته شده و با کیفیت، سعی شده تا با نگاهی دقیق و موشکافانه به فرهنگ و سبک زندگی ایرانی و اسلامی،دیجی استایل بعد از تجربه،کار و شناخت سلیقه مشتریان در دیجی کالا به این نتیجه رسید محصولات شرکت های خارج از ایران هم در کنار تولیدات ایرانی قرار گیرند تا با مقایسه محصولات داخلی و نمونه های مطرح جهانی، بتوانید بنا بر سلیقه خاص خود، تجربه ای به یاد ماندنی از خرید اینترنتی داشته باشید.
            </p>
        </span>
    </div>
@endsection
