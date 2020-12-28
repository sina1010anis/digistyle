<div style="width: 100%!important;" id="ViewSliderShit">
    @foreach($PhotoSliderAll as $i)
       <a style="width: 100%!important;" href=""><img src="{{url('/Data_User/Image/Slider/').'/'.$i->Image}}" title="{{$i->Name}}" alt=""></a>
    @endforeach
</div>
<div id="ViewBaner">
    @foreach($PhotoBanerAll as $i)
        <a href="">
            <div title="{{$i->Name}}" id="ViewBaner1">
                <img src="{{url('/Data_User/Image/Baner/').'/'.$i->Image}}" alt="">
                <p align="center"> <i class="fas fa-chevron-left"></i> نمایش محصولات  </p>
            </div>
        </a>
    @endforeach
</div>
