
// hathi fonction 7obi ama ana zedt es attribut taw na7ihom hna 
//nmchou nsamou input ta3na lbch ntstou 3lha dacc
//donc 3ena la7tha 
/* bhi hnatanfsrou kol parametre chno 
input : le nom de champ de texte 
,container : le form-group contient le champ de text hay tansmou taw container
,help: houwa nom ta3 span eli tatwrina lerreur 3rfti help anhou ey wi help yji e7t champ de text 
,alertIcon ;alert icon hya span fha glyphicon mra ok mra warning-sign 
,limit : limit hya contrainte ta3na ya3ni gdch men 7aref au minimum thz el champ dacc
   */

var name=0;
function alertInput(input,container,help,alertIcon,limit){

    var  prod=$("."+input).val();
    if (prod.length <limit)
    {
        $('.'+container).addClass('has-warning has-feedback');
        $('#'+help).removeClass('sr-only');
        $('#'+alertIcon).addClass('glyphicon-warning-sign').removeClass('glyphicon-ok');

// hna ki3oud 3ena akther men cham nwalou ntstou 3la champ chni bch ken hya valide 
//na3touha =1 si non =0 wath7 akid ama hna 3enachamp wda test ytna7a tawa 
// bch nbdou nfasrou awl etape lazem
//fama variable esmha prod hay 3adi ey 3arfa may2atherch aama ken category 5er ba3d bdli 5ali ngdou sa3a 

       
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
// fonction check() tchouf ya5a name wla les hcamp ta3na kol valide wla la ken valid twli affichna button ma3ch
//disabled ken mch kol chay valid twli t5aliha disabled wadha7
function check(){
    if(name>0){
    $('#btnAdd').removeClass('disabled');
    }
    else{
        $('#btnAdd').addClass('disabled');
    }

// hna na3mlou appel lele methode ta3na alertInput 
//hka 7obi bel jquery tre bien j'ai bien compris
//$ houwa selecteur yjbd ay 7aja selon id wla class ken id twali # fi blset .
// on hathikama3nhabchtgra event on click mthlan hna on input lel text ma3nha wgt lnktbou7arf
//taw na3mlou appel 
}

$(".categoryName").on('input',function() {
    alertInput('categoryName','containerCategory','categoryHelp','categoryAlertIcon',2);});