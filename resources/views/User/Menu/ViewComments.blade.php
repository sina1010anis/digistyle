@extends('User.Section.index')

@section('MenuUser')
    <div id="ViewOrderUserPanelOne">
        <table class="table">
            <tr>
                <th>نام محصول</th>
                <th>متن پیام</th>
                <th>وضعیت انتشار</th>
            </tr>
            @if($ViewCommentsPanelUser->count() == 0)
                شما پیامی نداده اید
            @else
                @foreach($ViewCommentsPanelUser as $i)
                    <tr>
                        <th>{{$i->Name}}</th>
                        <th dir="rtl" align="right">{{$i->Text}}</th>
                        @if($i->Status == 0)
                            <th>منتشر نشده</th>
                        @endif
                        @if($i->Status == 1)
                            <th>منتشر شده</th>
                        @endif
                    </tr>

                @endforeach
            @endif

        </table>
    </div>
@endsection
