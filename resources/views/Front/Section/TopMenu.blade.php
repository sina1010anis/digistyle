<div id="MenuIndex">
    <span class="ItemMenuIndex" id="ItemRight">
        <a href="{{route('UserPanelIndex_user')}}">
          ناحیه کاربری <i class="fas fa-user-circle"></i>
        </a>
    </span>
    @auth()
        <span class="ItemMenuIndex" id="ItemRightToRight">
              سبد خرید
            <i class="fas fa-shopping-cart"></i>
            <div id="ViewCartUser">
                <ul>
                    @foreach($ViewAllCartsUser as $i)
                        @foreach($ProductAll as $ii)
                            @if($i->User_id == auth()->user()->id and $i->Product_id == $ii->id)
                                <li title="{{$ii->Name}}">
                                    <img src="{{url('Data_User/Image/').'/'.$ii->Image}}" alt="">
                                    <span>تعداد : {{$i->Number}}</span>
                                    <a href="{{route('DeleteProductCart' , $i->id)}}" class="btn_RED">حذف</a>
                                </li>
                                <hr>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <div id="ViewTotalPrice">\
                <?php
                $total=0;
                foreach ($ViewAllCartsUser as $i){
                    if ($i->User_id == auth()->user()->id){
                        $total+=$i->Price;
                    }

                }
                echo '<p>'.$total.' تومان</p>';
                if($total > 0){
                    echo '<a href='.route('BuyProductCart').'>'.'پرداخت'.'</a>';
                }
                ?>

            </div>
        </span>
    @endauth
        <span class="ItemMenuIndex" id="ItemLeft">
         <i class="fas fa-book"></i> اخرین اخبار ایران شاپ
    </span>
</div>
<div id="SectionIconWeb">
    <span id="SectionIconWebLeft" class="btn_Border_Black_Small">دانلود اپلیکیشن</span>
    <span id="SectionIconWebRight">
        <form action="">
            <input class="inputSearchHeaderIndexPage" type="text" placeholder="چی میخوای !">
        </form>
        <span id="BoxViewSearch">

        </span>
    </span>
    <b><a style="color: #3e3e3e;font-size: 30px" href=""><span class="object_center_span">DIGISTYLE</span></a></b>
</div>
<div id="MenuFil">
    <ul class="Ul">
        @foreach($ItemParentMenuIndex as $i)
            <li class="ItemMenuName" id="{{$i->id}}">
                {{$i->NameParent}}
            </li>
        @endforeach
    </ul>
</div>
    @foreach($ItemParentMenuIndex as $i1)
        <div class="YouMenuItem" id="YouMenuItemShit{{$i1->id}}">
            @foreach($ItemChildMenuIndex as $i2)
                @if ($i2->Parent_id == $i1->id)
                    <div class="YouMenuItemChild">
                        <b><a href="{{route('ViewAllSubMenu' , $i2->NameCategory)}}">{{$i2->NameCategory}}</a></b>
                    <hr>
                    @foreach($ItemItemMenuIndex as $i3)
                        @if ($i3->Child_id == $i2->id)
                                <a href=""><p>{{$i3->NameItem}}</p></a>
                        @endif
                    @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach

