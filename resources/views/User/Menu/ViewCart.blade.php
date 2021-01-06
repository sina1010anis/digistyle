@extends('User.Section.index')

@section('MenuUser')
    <div id="ViewOrderUserPanelOne">
        <table class="table">
            <tr>
                <th>نام محصول</th>
                <th>تعداد سفارش</th>
            </tr>
            @if($cartsViewPanelUser->count() == 0)
                کارت شما خالی است
            @else
                @foreach($cartsViewPanelUser as $i)
                    <tr>
                        <th>{{$i->Name}}</th>
                        <th>
                            <a class="ViewOrderBTN" id="{{$i->id}}">
                                {{$i->Number}}
                            </a>
                        </th>
                    </tr>

                @endforeach
                @endif

        </table>
    </div>
@endsection
