@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_ViewAll_User">
            <?php
            if (session('msg')) {
                echo '<div align="center" style="width: 100%;padding: 5px;background-color: #5ca958;color: white">'.session('msg').'</div>';
            }
            ?>
            <table  class="table table-hover">
                <thead>
                <tr>
                    <th>ایدی</th>
                    <th>نام </th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($DataUsers as $i)
                    <tr>
                        <th>{{$i->id}}</th>
                        <th>{{$i->Name}}</th>
                        <th>{{$i->email}}</th>
                        <th>
                            @if ($i->Roule == 1)
                                <p style="color: green">{{'مدیر'}}</p>
                            @else
                                <p style="color: red">{{'کاربر عادی'}}</p>
                            @endif
                        </th>
                        <th>
                            <a href="{{route('UserDelete_admin' , $i->Name)}}" class="btn_RED">حذف</a>
                        </th>
                        <th>
                            <a href="{{route('UserShowEdit_admin' , $i->Name)}}" class="btn_BLUE">ویرایش</a>
                        </th>
                        <th>
                            <a href="{{route('UserShowOne_admin' , $i->Name)}}" class="btn_ORANGE">مشخصات کلی</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{$DataUsers->links()}}
    </div>
@endsection
