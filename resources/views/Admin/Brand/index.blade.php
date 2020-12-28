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
                <th>نام برند</th>
                <th>کشور مربوط</th>
                <th>عکس</th>
                <th>حذف</th>
                <th>ویرایش</th>
                <th>تغییر وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($DatasBrand as $i)
                <tr>
                    <th>{{$i->id}}</th>
                    <th>{{$i->Name}}</th>
                    <th>{{$i->Country}}</th>
                    <th>
                        <img width="50px" height="50px" src="{{url('Data_User/image/brand').'/'.$i->Image}}" alt="">
                    </th>
                    <th><a class="btn_RED" href="{{route('BrandDeletePage_admin' , $i->id)}}">حذف</a></th>
                    <th><a href="{{route('BrandEditPage_admin' , $i->id)}}" class="btn_ORANGE" >ویرایش</a></th>
                    @if ($i->Status === 1)
                        <th><a href="{{route('BrandEditStatus_admin' , $i->id)}}" class="btn_GREEN">نمایش بده</a></th>
                    @else
                        <th><a href="{{route('BrandEditStatus_admin' , $i->id)}}" class="btn_RED">عدم نمایش</a></th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$DatasBrand->links()}}
    </div>
@endsection
