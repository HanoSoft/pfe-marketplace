//modal delete
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;// Button that triggered the modal
    var id= button.data('wathever'); // Extract info from data-* attributes
    var modal = $(this);
    modal.find('#form').attr("action",id);
});
