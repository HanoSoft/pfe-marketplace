//modal delete
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;// Button that triggered the modal
    var id= button.data('wathever'); // Extract info from data-* attributes
    var modal = $(this);
    modal.find('#form').attr("action",id);
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

