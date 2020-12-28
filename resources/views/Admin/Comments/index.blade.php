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
                <th>متن</th>
                <th>وضعیت</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $i)
                <tr>
                    <th >{{$i->id}}</th>
                    @foreach($user as $ii)
                        @if($ii->id == $i->id_user)
                            <th title="{{$ii->Name}}">{{$i->Name}}</th>
                            <th title="{{$i->id}}">{{$ii->email}}</th>
                        @endif
                    @endforeach
                    <th><p dir="rtl" align="right">{{$i->Text}}</p></th>
                    @if($i->Status == 0)
                        <th style="color: red" title="غیر قابل نمایش"><a href="{{route('EditCommentsOne_admin' , $i->id)}}"><i class="fas fa-times"></i></a></th>
                    @else
                        <th style="color: green" title=" قابل نمایش"><a href="{{route('EditCommentsOne_admin' , $i->id)}}"><i class="fas fa-check"></i></a></th>
                    @endif
                    <th>
                        <a href="{{route('DeleteCommentsOne_admin' , $i->id)}}" class="btn_RED">حذف</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$comments->links()}}
    </div>
@endsection
