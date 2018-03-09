var name,details,quantity,price =0;
function alertInput(input,container,help,alertIcon,limit){

    var  prod=$("."+input).val();
    if (prod.length <limit)
    {
        $('.'+container).addClass('has-warning has-feedback');
        $('#'+help).removeClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-warning-sign').removeClass('glyphicon-ok');

        if(input==="productName"){
            name=0;
        }
        else if (input==="details"){details=0;}
        else if (input==="quantity"){quantity=0;}

    }
    else{
        $('.'+container).addClass('has-success has-feedback');
        $('#'+help).addClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-ok').removeClass('glyphicon-warning-sign');

        if(input==="productName"){
            name=1;
        }
        else if (input==="details"){details=1;}
        else if (input==="quantity"){quantity=1;}
        check();




    }
}

function check(){
    if(name>0 && details>0 && quantity>0 &&price>0){
    $('#btn').removeClass('disabled');
    }
    else{
        $('#btn').addClass('disabled');
    }

}


// this check only for the price to have a numeric value
$('.price').on('input',function () {
    price=$('.price').val();

    if($.isNumeric(price)){
    $('#priceHelp').addClass('sr-only');
    price=1;
        check();
    }
    else{
        $('#priceHelp').removeClass('sr-only');
        price=0;

    }
});


$(".productName").on('input',function() {
    alertInput('productName','prod','productHelp','productAlertIcon',2);

});

$(".details").on('input',function() {
    alertInput('details','containerDetails','detailsHelp','detailsAlertIcon',5);

});
$(".quantity").on('input',function() {
    alertInput('quantity','containerQuantity','quantityHelp','quantityAlertIcon',1);

});


//code modal js

$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;// Button that triggered the modal
    var id= button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);

    modal.find('#delete').attr("href",id);


});





