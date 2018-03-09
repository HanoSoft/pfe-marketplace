
function createSizeInput (){

        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        var i='size'+value;
        $('#container').append('<div class="form-group">\n' +
            '<label  class="col-sm-2 control-label">Taille :</label>\n' +
            '                        <div class="row">\n' +
            '                            <div class="col-sm-9">\n' +
            '                               <input type="text" class="form-control" placeholder="Taille" name="\' + size  "\'>\n' +
            '                            </div>\n' +
            '\n' +

            '\n' +
            '                        </div>\n' +
            '                    </div>');
        $('#input1').attr('name', 'other_amount');


    }
$('#addSize').click(createSizeInput);
