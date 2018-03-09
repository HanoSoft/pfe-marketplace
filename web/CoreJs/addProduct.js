//
var prod;
    $(".productID").change(function() {
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


    });


