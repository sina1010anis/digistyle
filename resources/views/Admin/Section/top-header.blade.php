<header>
    <ul class="ul_icon_header" id="ul_PL">
        <li><i class="fas fa-user"></i></li>
        <li><i class="fas fa-comment-dots"><span style="font-size: 10px;color: red"> 9+ </span></i></li>
        <li><i class="fas fa-database"><span style="font-size: 10px;color: red"> 9+ </span></i></li>
    </ul>
    <ul class="ul_icon_header" id="ul_PR">
        <li><i id="Icon_View_Menu" class="fas fa-igloo"></i></li>
        <li>
            <form action="" method="post">
                <input type="text" placeholder="جستوجو">
                <button><i class="fas fa-search"></i></button>
            </form>
        </li>
    </ul>
</header>
<style>
    a{
        color: unset!important;
    }
</style>
<div id="Menu_Left">
    <ul class="ul_menu_right_panel_admin">
        <li>
            <a href="{{route('index_admin')}}">
            داشبورد <i id="Icon_View_Menu" class="fas fa-tachometer-alt"></i>
            </a>
        </li>
        <li class="item_menu">مدریت کاربران <i id="Icon_View_Menu" class="fas fa-users"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="{{route('UserNewPage_admin')}}">ایجاد کاربر جدید</a></li>
                <li><a href="{{route('ViewUserAll_admin')}}">مشاهده کاربران</a></li>
            </ul>
        </li>
        <li class="item_menu">مدریت محصولات <i id="Icon_View_Menu" class="fas fa-box"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="{{route('ProductNewPage_admin')}}">ایجاد محصول جدید</a></li>
                <li><a href="{{route('ProductShowAll_admin')}}">مشاهده کل محصولات</a></li>
            </ul>
        </li>
        <li class="item_menu">مدریت دسته ها <i id="Icon_View_Menu" class="fas fa-bars"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="{{route('category_admin')}}">ایجاد دسته جدید</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('ViewOredersUser_admin')}}">
                مدریت سفارشات <i id="Icon_View_Menu" class="fas fa-cash-register"></i>
            </a>
        </li>
        <li class="item_menu">مدریت برند ها <i id="Icon_View_Menu" class="fab fa-diaspora"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="{{route('BrandViewPage_admin')}}">مشاهده برند</a></li>
                <li><a href="{{route('BrandNewPage_admin')}}">ایجاد برند</a></li>
            </ul>
        </li>
        <li class="item_menu">مدریت تخفیف ها <i id="Icon_View_Menu" class="fab fa-diaspora"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="/admin/discountshow">مشاهده تخفیف</a></li>
                <li><a href="/admin/discount">ایجاد تخفیف جدید</a></li>
            </ul>
        </li>
        <li class="item_menu">مدریت عکس ها <i id="Icon_View_Menu" class="fab fa-pictures"></i>
            <ul class="ul_menu_right_panel_admin_to_ul_A">
                <li><a href="/admin/discountshow">مشاهده عکس (اسلایدر و بنر)</a></li>
                <li><a href="{{route('NewImageSlid_admin')}}">ایجاد عکس (اسلایدر یا بنر)</a></li>
            </ul>
        </li>
        <li><a href="{{route('CommentsView_admin')}}">
            مدریت دیدگاه ها <i id="Icon_View_Menu" class="fas fa-comment-dots"></i>
            </a>
        </li>
    </ul>
</div>
