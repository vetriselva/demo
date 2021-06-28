$(document).ready(function(){
    const base_url = $("#baseurl").val();
    const inputElement = document.querySelector('#file_upload');
    const pond = FilePond.create( inputElement );
    var _token = $('meta[name="csrf-token"]').attr('content');
    FilePond.setOptions({
    server:{
      url: '/admin',
      process: '/upload-file',
      revert: '/delete-file',
        headers: {
              'X-CSRF-TOKEN': _token
              }
      }
  }); 

  $(document).on('submit', '#registerform-form', function(e) {
    e.preventDefault();
    var formData = $("#registerform-form").serialize();
    console.log(formData);
    var url = `${base_url}/admin/registerform`;
    $.post(url, formData,function(data){
        location.href=`${base_url}/admin/registerform`;
    });
  });
});

var url    = $("#baseurl").val()+'/admin/get-registration-api';
$('#register-form-table').DataTable({
  "responsive": true,
  "processing": true,
  "serverSide": true,
  "order": [[ 0, "desc" ]],
  "ajax": url, 
  "columns": [
          { data: "id", name:"id"},
          { data: "created_at" , name:"created_at", },
          { data: "name" , name:"name"},
          { data: "email_id" , name:"email_id"},
          { data: "mobile_no" , name:"mobile_no"},
          { data: "description" , name:"description"},
          {data: "action"}
          ],            
      colReorder: true
});