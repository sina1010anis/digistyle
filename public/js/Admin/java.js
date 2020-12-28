$(document).ready(function () {
    $("#Icon_View_Menu").click(function () {
        $("#Menu_Left").stop().slideToggle(500);
    })
    $(".item_menu").click(function () {
        $(this).stop().find('ul').slideToggle(500);
    })
    $("#icon_page_tree").click(function () {
        $("#Page_Tree_Category").fadeIn(500);
        $("#Page_To_Page").fadeIn(500);
    })
    $("#icon_page_close").click(function () {
        $("#Page_Tree_Category").fadeOut(500);
        $("#Page_To_Page").fadeOut(500);
    })
    $("#Show_Hide_Shit_A").click(function () {
        $("#Show_Hide_Shit_B").show(500);
        $(this).hide(500);
        $("#Shit_New_Category").css({'height': '650px', 'transition': '0.5s', 'width': '98%'});
    })
    $("#Show_Hide_Shit_B").click(function () {
        $("#Show_Hide_Shit_A").show(500);
        $(this).hide(500);
        $("#Shit_New_Category").css({'height': '300px', 'transition': '0.5s', 'width': '98%'});
    })
    $("#btn_Parent").click(function () {
        $("#P_T_input_Shit_Delete_Category_PAD").stop().slideToggle();
        $("#C_T_input_Shit_Delete_Category_PAD").stop().slideUp();
        $("#I_T_input_Shit_Delete_Category_PAD").stop().slideUp();
    })
    $("#btn_Child").click(function () {
        $("#P_T_input_Shit_Delete_Category_PAD").stop().slideUp();
        $("#C_T_input_Shit_Delete_Category_PAD").stop().slideToggle();
        $("#I_T_input_Shit_Delete_Category_PAD").stop().slideUp();
    })
    $("#btn_Item").click(function () {
        $("#P_T_input_Shit_Delete_Category_PAD").stop().slideUp();
        $("#C_T_input_Shit_Delete_Category_PAD").stop().slideUp();
        $("#I_T_input_Shit_Delete_Category_PAD").stop().slideToggle();
    })
    $('.T_input_Shit_Delete_Category_PAD select').click(function () {
        var val = $(this).val();
        $(".Text_Edit").val(val);
    })
    $("#form_New_Product").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Form = new FormData(this);
        var DE = $('#DE').val();
        var price = $('input[name=price]').val();
        var Name = $('input[name=Name]').val();
        var Brand = $('#Brands').val();
        if (Name == '') {
            Err = 1;
            $('input[name=Name]').css({'border': '1px solid red'});
        } else {
            $('input[name=Name]').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }
        if (price == '') {
            Err = 1;
            $('input[name=price]').css({'border': '1px solid red'});
        } else {
            $('input[name=price]').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }
        if (DE == '') {
            Err = 1;
            $('#DE').css({'border': '1px solid red'});
        } else {
            $('#DE').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }
        if (Err == 0) {
            $.ajax({
                url: '/admin/product/New/LE1',
                data: {Name: Name, price: price, DE: DE,Brand:Brand},
                type: 'post',
/*                                contentType:false,
                                processData: false,
                                cache:false*/
            }).done(function (msg) {
                if (msg == '00-1') {
                    $('input[name=Name]').css({'border': '1px solid red'});
                }
                if (msg == '00-2') {
                    $('input[name=price]').css({'border': '1px solid red'});
                }
                if (msg == '00-3') {
                    $('input[name=DE]').css({'border': '1px solid red'});
                }
                if (msg == 'ok') {
                    $('#LE_1').fadeOut(200);
                    $('#LE_2').fadeIn(200);
                    $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
                    $(".LE_NEW_C").css({'border': '2px solid #5ca958'})
                }
            })
        }

    })


    $("#form_New_Product2").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Item = $('#form_New_Product2 select[name=Item_Product]').val();
        var SubMenu = $('#form_New_Product2 select[name=SubMenu]').val();
        var Parent = $('#form_New_Product2 select[name=Parent]').val();
        $.ajax({
            url: '/admin/product/New/LE2',
            data: {Item: Item , SubMenu:SubMenu , Parent:Parent},
            type: 'post',
            /*                contentType:false,
                            processData: false,
                            cache:false,*/
        }).done(function (msg) {
            alert(msg);
            $('#LE_1').fadeOut(200);
            $('#LE_2').fadeOut(200);
            $('#LE_3').fadeIn(200);
            $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
            $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
            $(".LE_NEW_S").css({'border': '2px solid #5ca958'})
        })

    })


    $("#form_New_Product3").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Status = $('#form_New_Product3 select').val();
        $.ajax({
            url: '/admin/product/New/LE3',
            data: {Status: Status},
            type: 'post',
            /*                contentType:false,
                            processData: false,
                            cache:false,*/
        }).done(function (msg) {
            $('#LE_1').fadeOut(200);
            $('#LE_2').fadeOut(200);
            $('#LE_3').fadeOut(200);
            $('#LE_5').fadeIn(200);
            $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
            $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
            $(".LE_NEW_S").css({'background-color': '#5ca958', 'color': '#fff'})
            $(".LE_NEW_K").css({'border': '2px solid #5ca958'})
        })

    })

    $("#form_New_Product4").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Data = new FormData(this);
        $.ajax({
            url: '/admin/product/New/LE4',
            data: Data,
            type: 'post',
            contentType: false,
            processData: false,
            cache: false,
        }).done(function (msg) {
            if (msg == 'ok') {
                $('#LE_1').fadeOut(200);
                $('#LE_2').fadeOut(200);
                $('#LE_3').fadeOut(200);
                $('#LE_5').fadeOut(200);
                $('#LE_4').fadeOut(200);
                $('#LE_6').fadeIn(200);
                $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_S").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_K").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_A").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_F").css({'background-color': '#5ca958', 'color': '#fff'})
            }
        })

    })

    $("#form_New_Product5").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Name = $('input[name=Name_K]').val();
        var Item = $('input[name=Item_K]').val();
        if (Name == '') {
            Err = 1;
            $('input[name=Name_K]').css({'border': '1px solid red'});
        } else {
            $('input[name=Name_K]').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }
        if (Item == '') {
            Err = 1;
            $('input[name=Item_K]').css({'border': '1px solid red'});
        } else {
            $('input[name=Item_K]').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }
        $.ajax({
            url: '/admin/product/New/LE5/',
            data: {Name_K:Name , Item_K:Item},
            type: 'post',
/*            contentType: false,
            processData: false,
            cache: false,*/
        }).done(function (msg) {

            if (msg == 'ok') {
                alert('('+Name+'-'+Item+')'+'یک خصوصیات اضافه شد با مقدار');
                 $('input[name=Name_K]').val('');
                 $('input[name=Item_K]').val('');
/*                $('#LE_1').fadeOut(200);
                $('#LE_2').fadeOut(200);
                $('#LE_3').fadeOut(200);
                $('#LE_4').fadeOut(200);
                $('#LE_5').fadeIn(200);
                $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_S").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_K").css({'background-color': '#5ca958', 'color': '#fff'})
                $(".LE_NEW_A").css({'border': '2px solid #5ca958'})*/
            }
        })
    })

    $("#form_New_Product6").on('submit', function (e) {
        e.preventDefault();
        var Err = 0;
        var Size = $('input[name=Size]').val();
        if (Size == '') {
            Err = 1;
            $('input[name=Size]').css({'border': '1px solid red'});
        } else {
            $('input[name=Size]').css({'border': '1px solid rgba(153, 153, 153, 0.5)'});
        }

        $.ajax({
            url: '/admin/product/New/LE6/',
            data: {Size:Size},
            type: 'post',
            /*            contentType: false,
                        processData: false,
                        cache: false,*/
        }).done(function (msg) {

            if (msg == 'ok') {
                alert('('+Size+')'+'سایز اضافه شد مقدار ');
                $('input[name=Size]').val('');

                /*                $('#LE_1').fadeOut(200);
                                $('#LE_2').fadeOut(200);
                                $('#LE_3').fadeOut(200);
                                $('#LE_4').fadeOut(200);
                                $('#LE_5').fadeIn(200);
                                $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
                                $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
                                $(".LE_NEW_S").css({'background-color': '#5ca958', 'color': '#fff'})
                                $(".LE_NEW_K").css({'background-color': '#5ca958', 'color': '#fff'})
                                $(".LE_NEW_A").css({'border': '2px solid #5ca958'})*/
            }
        })
    })
    $("#LE_5 #LE2_BU").click(function (){
        $('#LE_1').fadeOut(200);
        $('#LE_2').fadeOut(200);
        $('#LE_3').fadeOut(200);
        $('#LE_5').fadeOut(200);
        $('#LE_4').fadeIn(200);
        $(".LE_NEW_P").css({'background-color': '#5ca958', 'color': '#fff'})
        $(".LE_NEW_C").css({'background-color': '#5ca958', 'color': '#fff'})
        $(".LE_NEW_S").css({'background-color': '#5ca958', 'color': '#fff'})
        $(".LE_NEW_K").css({'background-color': '#5ca958', 'color': '#fff'})
        $(".LE_NEW_A").css({'border': '2px solid #5ca958'})
    })
    $("#Shit_New_Brand form").on('submit' , function (e){
        e.preventDefault();
        var Data=new FormData(this);
        Data.append('Name' , $('input[name=Name]').val());
        Data.append('Country' , $('input[name=Country]').val());

        $.ajax({
            url:'/admin/New/Brand',
            data:Data,
            type:'post',
            cache:false,
            processData: false,
            contentType: false,
        }).done(function (msg){
            if (msg == 'ok'){
                $('input[name=Name]').val('');
                $('input[name=Country]').val('');
                alert('برند جدیدی اضافه شد')
            }
        })
    })
    $("#OpenPageAddAttr").click(function (){
        $("#PageAddAttr").fadeIn(200);
    })
    $("#ClosePageAddAttr").click(function (){
        $("#PageAddAttr").fadeOut(200);
    })
    $("#OpenPageAddImage").click(function (){
        $("#PageAddPhoto").fadeIn(200);
    })
    $("#ClosePageAddImage").click(function (){
        $("#PageAddPhoto").fadeOut(200);
    })
    $("#FormNewPhotoProduct").on('submit' , function (e){
        e.preventDefault();
        var Data = new FormData(this);
        var id = $(this).find('.btn_GREEN').attr('id');
        Data.append('id', $(this).find('.btn_GREEN').attr('id'));
        $.ajax({
            url:'/admin/product/New/Photo/One',
            type:"POST",
            data:Data,
            contentType:false,
            cache:false,
            processData:false
        }).done(function (msg){
            if (msg == 'ok'){
                alert('عکس با موفقیت اضافه شد');
            }
        })
    })
    $(".ImageOneProduct").click(function (){
        var img = $(this).attr('src');
       $('#ViewProduct').fadeIn(200);
       $('#ViewProduct img').attr('src' , img);
    })
    $("#ClosePageViewImage").click((function (){
        $("#ViewProduct").fadeOut(200);
    }))
    $("#FormNewPhotoSlid").on('submit' , function (e){
        e.preventDefault();
        var Data=new FormData(this);
        Data.append('id_product' , $('select[name=id_product]').val());
        Data.append('Name' , $('input[name=Name]').val());
        Data.append('berand' , $('select[name=id_brand]').val());
        $.ajax({
            url:'/admin/Slid/New/Photo',
            data:Data,
            type:"POST",
            contentType:false,
            processData:false,
            cache:false
        }).done(function (msg){
            alert('عکس با موفقیت ذخیره شد');
        })

    })
    $("#FormNewPhotoBaner").on('submit' , function (e){
        e.preventDefault();
        var Data=new FormData(this);
        Data.append('Name' , $('input[name=NameB]').val());
        Data.append('id_brand' , $('select[name=id_brandB]').val());
        $.ajax({
            url:'/admin/Ban/New/Photo',
            data:Data,
            type:"POST",
            contentType:false,
            processData:false,
            cache:false
        }).done(function (msg){
            alert('با موفقیت ذخیره شد');
        })

    })
})

