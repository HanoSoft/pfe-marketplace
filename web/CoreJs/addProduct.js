function createSizeInput (){

    $('#container').append('<div class="form-group">\n' +
        '<label  class="col-sm-2 control-label">Taille :</label>\n' +
        '                        <div class="row">\n' +
        '                            <div class="col-sm-9">\n' +
        '                               <input type="text" class="form-control" placeholder="Taille">\n' +
        '                            </div>\n' +
        '\n' +

        '\n' +
        '                        </div>\n' +
        '                    </div>');
}
$('#addSize').click(createSizeInput);