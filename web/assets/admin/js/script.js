//modal delete
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;// Button that triggered the modal
    var id= button.data('wathever'); // Extract info from data-* attributes
    var modal = $(this);
    modal.find('#form').attr("action",id);
});
//modal enable
$('#enable').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var id= button.data('wathever');
    var modal = $(this);
    modal.find('#form').attr("action",id);
});
//modal promotion
$('#promotion').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget) ;
        var id= button.data('wathever');
        var modal = $(this);
        var href=modal.find('#link').attr("href");
        var result;
        result=id+'/'+href;
        modal.find('#link').attr("href",result);
    });

// form validation

$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-warning');
        $(element).closest('.form-group').find('span.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
        $(element).closest('.form-group').find('span.glyphicon').effect( "slide" );
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-warning').addClass('has-success');
        $(element).closest('.form-group').find('span.glyphicon').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
$(".form").validate();

$('.form input').on('keyup blur', function () {
    if ($('.form').valid()) {
        $('button.btn').prop('disabled', false);
    }
    else {
        $('button.btn').prop('disabled', 'disabled');
    }
});
// dataTable
$(document).ready( function () {
    $('.data-table').DataTable();
} );
/*thumbnail with modal*/
$(document).ready(function() {
    var $lightbox = $('#lightbox');

    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'),
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };

        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });

    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');

        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});
/*------- image file------*/
function readURL(input,preview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(preview).css('background-image', 'url('+e.target.result +')');
            $(preview).hide();
            $(preview).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#corebundle_brand_brandImage_file").change(function() {
    readURL(this,'#imagePreview1');
});

$("#corebundle_brand_logo_file").change(function() {
    readURL(this,'#imagePreview');
});
$("#corebundle_image_file").change(function() {
    readURL(this,'#imagePreview');
});
$("#brand_edit_logo_file").change(function() {
    readURL(this,'#imagePreview');
});
$("#brand_edit_brandImage_file").change(function() {
    readURL(this,'#imagePreview1');
});