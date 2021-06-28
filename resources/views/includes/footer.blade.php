<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('assets/js/filepond.min.js') }}" ></script>
<script  type="text/javascript" src="{{ asset('assets/js/jquery-3.6.js') }}" ></script>
{{-- datatable --}}
<script type="text/javascript" src="{{ asset('assets/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/datatables/js/dataTables.bootstrap.js') }}" ></script>
<script>
    jQuery(document).ready(function($){
        $("#menu-toggle").text('-');
        var toggle = true;
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        if(toggle) {
            $("#menu-toggle").text('+');
            toggle = false;
        }  else {
            $("#menu-toggle").text('-');
            toggle = false;
        }
        $("#wrapper").toggleClass("toggled");
        });
    });
   //general delete modal popup
    $(document).on('click', '.delete-modal-popup', function (event) {
        $("#delete-confirmation-modal").modal('show');
        var action = $(this).data('action');
        console.log(action)
        var csrfToken = $('meta[name=csrf-token]').attr("content");
        var modal = $("#delete-confirmation-modal");
        modal.find('.modal-footer form').prop("action", action);
        modal.find('input[name="_token"]').prop("value", csrfToken);
    });
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>