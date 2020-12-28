@extends('Admin.Section.index-page')

@section('index')
    <div id="View_Set">
            <span>
                <p  align="center">
                    <i  class="fas fa-users View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    کابران فعال
                </p>
                <p class="View_SET_P" align="center">
                    20
                </p>
            </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-shopping-cart View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    سفارشات
                </p>
                <p class="View_SET_P" align="center">
                    18
                </p>
        </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-comment-dots View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    پیام های خصوصی
                </p>
                <p class="View_SET_P" align="center">
                    20
                </p>
        </span>
        <span>
                            <p  align="center">
                    <i  class="fas fa-money-bill-alt View_SET_P"></i>
                </p>
                <p class="View_SET_P" align="center">
                    درامد
                </p>
                <p class="View_SET_P" align="center">
                    20
                </p>
        </span>
    </div>
    <div class="View_Table_Panel_admin" id="View_Comments" dir="rtl">
        <h3 align="center">نظرات کاربران</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>متن</th>
                <th>فرزند</th>
                <th>تاریخ</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="View_Table_Panel_admin" id="View_Orders" dir="rtl">
        <h3 align="center">سفارشات موفق</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>متن</th>
                <th>فرزند</th>
                <th>تاریخ</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            <tr>
                <td align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
                <td  align="left">1</td>
                <td  align="left">Mark</td>
                <td  align="left">Otto</td>
                <td  align="left">@mdo</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
