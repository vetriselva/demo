$(document).ready(function(){
    const base_url = $("#baseurl").val();
    const inputElement = document.querySelector('#file_upload');
    const pond = FilePond.create( inputElement );
    var _token = $('meta[name="csrf-token"]').attr('content');
    var  id = $("#registration_id").val();
    console.log(id);
    FilePond.setOptions({
    server:{
      url: '/admin',
      process: `/edit-upload-file/${id}`,
      revert: `/delete-file`,
        headers: {
              'X-CSRF-TOKEN': _token
              }
      }
  }); 
  $(document).on('submit', '#update-registerform', function(e) {
    e.preventDefault();
    var formData = $("#update-registerform").serialize();
    var id = $("#registration_id").val();
    var url = `${base_url}/admin/registerform/${id}`;
    $.ajax({
        url : url,
        method : 'PUT',
        data : formData,
        headers: {
            'X-CSRF-TOKEN': _token
            },
        success: function(e) {
            if(e.status == 'success') {
                location.reload();
            }
        },
        error: function(e) {
            console.log(e);
        } 
    });
  });

});

function printDocument (d) {
    var path =  $(d).attr("data-path");
    var document_type = $(d).attr("data-document_type");
    $("#pdf_files").html("");
    var baseurl = $('#baseurl').val();
    $.ajax({
        type: 'get', 
        url : `${baseurl}/admin/getfile/${document_type}`, 
        data:{path:path},
        success : function (data) {
            if(document_type == 'pdf')
                var htmlPop = '<iframe id="iframe" src="data:application/pdf;base64,'+data+'"  width="100%" height="1000" allowfullscreen webkitallowfullscreen disableprint=true; ></iframe>';
            else
                var htmlPop = '<embed width="100%" height="1000" src="data:image/png;base64,'+data+'"></embed>'; 
  
            $("#pdf_files").html(htmlPop);
            $('#print-view-modal').modal('show');
        }
    });
  };

$(document).on('click','.delete-document', function() {
    var document = $(this).data('document');
    var  base_url = $("#baseurl").val();
    var _token = $('meta[name="csrf-token"]').attr('content');
    var url = `${base_url}/admin/edit-delete-file`;  
    $.ajax({
        url : url,
        method : 'DELETE',
        data : {document:document},
        headers: {
            'X-CSRF-TOKEN': _token
            },
        success: function(e) {
                location.reload();
        },
        error: function(e) {
            console.log(e);
        } 
    });
});