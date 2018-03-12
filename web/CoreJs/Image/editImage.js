var label=0;
function alertImage(input,container,help,alertIcon,limit){

    var  size=$("."+input).val();

    if (size.length <limit) {
        $('.' + container).addClass('has-warning has-feedback');
        $('#' + help).removeClass('sr-only');
        $('#' + alertIcon).addClass('glyphicon-warning-sign').removeClass('glyphicon-ok');

        label = 0;
        checkImage();

    }
    else{
        $('.'+container).addClass('has-success has-feedback');
        $('#'+help).addClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-ok').removeClass('glyphicon-warning-sign');

        if (input==="labelImage"){label=1;}

        checkImage();
    }
}

function checkImage() {
    if (label >0 ) {
        $('#editImage').removeClass('disabled');
    }
    else {
        $('#editImage').addClass('disabled');
    }
}

$(".labelImage").on('input',function() {
    alertImage('labelImage','containerLabelImage','LabelImageHelp','LabelImageAlertIcon',1);
});