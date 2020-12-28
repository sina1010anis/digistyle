@extends('Admin.Section.index-page')

@section('index')
    <div id="Shit_New_Brand">
        <h4 align="center">ایجاد برند</h4>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="Name" placeholder="نام برند">
            <input type="text" name="Country" placeholder="کشور سازنده">
            <input type="file" name="Image">
            <div style="margin-top: 20px" class="object_center">
                <button class="btn_BLUE" type="submit">ایجاد کن</button>
            </div>
        </form>
    </div>
@endsection
