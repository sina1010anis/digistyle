$(document).ready(function (){
   $("#K1 form").on('submit' , function (e){
       e.preventDefault();
       var L1=parseFloat($('input[name=L1K1]').val());
       var L2=parseFloat($('input[name=L2K1]').val());
       var L3=parseFloat($('input[name=L3K1]').val());

       var L11=parseFloat($('input[name=L11K1]').val());
       var L12=parseFloat($('input[name=L12K1]').val());
       var L13=parseFloat($('input[name=L13K1]').val());

       var D1=104974;
       var D2=134891;
       var D3=240841;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

                var A = 1/Mad;

        alert(A);
   })
    $("#K2 form").on('submit' , function (e){
        e.preventDefault();
        var L1=parseFloat($('input[name=L1K2]').val());
        var L2=parseFloat($('input[name=L2K2]').val());
        var L3=parseFloat($('input[name=L3K2]').val());

        var L11=parseFloat($('input[name=L21K2]').val());
        var L12=parseFloat($('input[name=L22K2]').val());
        var L13=parseFloat($('input[name=L23K2]').val());

        var D1=104974;
        var D2=134891;
        var D3=240841;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

                var A = 1/Mad;

        alert(A);
    })
    $("#K3 form").on('submit' , function (e){
        e.preventDefault();
        var L1=parseFloat($('input[name=L1K3]').val());
        var L2=parseFloat($('input[name=L2K3]').val());
        var L3=parseFloat($('input[name=L3K3]').val());

        var L11=parseFloat($('input[name=L31K3]').val());
        var L12=parseFloat($('input[name=L32K3]').val());
        var L13=parseFloat($('input[name=L33K3]').val());

        var D1=104974;
        var D2=134891;
        var D3=240841;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

                var A = 1/Mad;

        alert(A);
    })




    $("#L2 form").on('submit' , function (e){
        e.preventDefault();
        var L1=parseFloat($('input[name=K1L2]').val());
        var L2=parseFloat($('input[name=K2L2]').val());
        var L3=parseFloat($('input[name=K3L2]').val());

        var L11=parseFloat($('input[name=L21L2]').val());
        var L12=parseFloat($('input[name=L22L2]').val());
        var L13=parseFloat($('input[name=L23L2]').val());

        var D1=178424;
        var D2=178939;
        var D3=277381;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

                var A = 1/Mad;

        alert(A);
    })
    $("#L3 form").on('submit' , function (e){
        e.preventDefault();
        var L1=parseFloat($('input[name=K1L3]').val());
        var L2=parseFloat($('input[name=K2L3]').val());
        var L3=parseFloat($('input[name=K3L3]').val());

        var L11=parseFloat($('input[name=L31L3]').val());
        var L12=parseFloat($('input[name=L32L3]').val());
        var L13=parseFloat($('input[name=L33L3]').val());

        var D1=178424;
        var D2=178939;
        var D3=277381;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

                var A = 1/Mad;

        alert(A);
    })
    $("#L1 form").on('submit' , function (e){
        e.preventDefault();
        var L1=parseFloat($('input[name=K1L1]').val());
        var L2=parseFloat($('input[name=K2L1]').val());
        var L3=parseFloat($('input[name=K3L1]').val());

        var L11=parseFloat($('input[name=L11L1]').val());
        var L12=parseFloat($('input[name=L12L1]').val());
        var L13=parseFloat($('input[name=L13L1]').val());

        var D1=178424;
        var D2=178939;
        var D3=277381;

        var Mad=(L1*L11*D1)+(L2*L12*D2)+(L3*L13*D3);

        var A = 1/Mad;

        alert(A);
    })
});
