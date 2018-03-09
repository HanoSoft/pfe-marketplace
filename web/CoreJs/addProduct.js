//
function alertInput(input,container,help,warning,success){
   var  prod=$("."+input).val();
    if (prod.length <2)
    {
        $('.'+container).addClass('has-warning has-feedback');
        $('#'+help).removeClass('sr-only');
        $('#'+warning).removeClass('sr-only');
        $('#'+success).addClass('sr-only');


    }
    else{
        $('.'+container).addClass('has-success has-feedback');
        $('#'+help).addClass('sr-only');
        $('#'+warning).removeClass('sr-only');
        $('#'+success).addClass('sr-only');
    }
}



var prod;
    $(".productName").change(function() {
       alertInput('productName','prod','productHelp','productWarning','productSuccess');

    });

/*
$(".productDetails").change(function() {
    prod=$(".productID").val();
    if (prod.length <2)
    {
        $('.prod').addClass('has-warning has-feedback');
        $('#productHelp').removeClass('sr-only');
        $('#productWarning').removeClass('sr-only');
        $('#productSuccess').addClass('sr-only');
        $('#btn').removeClass('disabled');

    }
    else{
        $('.prod').addClass('has-success has-feedback');
        $('#productHelp').addClass('sr-only');
        $('#productSuccess').removeClass('sr-only');
        $('#productWarning').addClass('sr-only');
    }

});*/