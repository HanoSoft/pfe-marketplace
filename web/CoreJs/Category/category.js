// validate the add form
var name=0;
function alertInput(input,container,help,alertIcon,limit){

    var  prod=$("."+input).val();
    if (prod.length <limit)
    {
        $('.'+container).addClass('has-warning has-feedback');
        $('#'+help).removeClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-warning-sign').removeClass('glyphicon-ok');
 
            name=0;
            check();
    }
    else{
        $('.'+container).addClass('has-success has-feedback');
        $('#'+help).addClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-ok').removeClass('glyphicon-warning-sign');
        
            name=1;
            check();
    }
}
function check(){
    if(name>0){
        $('#btnAdd').removeClass('disabled');
    }
    else{
        $('#btnAdd').addClass('disabled');
    }
}
$(".categoryName").on('input',function() {
    alertInput('categoryName','containerCategory','categoryHelp','categoryAlertIcon',2);});


