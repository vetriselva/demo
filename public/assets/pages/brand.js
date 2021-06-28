
    var url    = $("#baseurl").val()+'/admin/get-brand-api';
	$('#brands-table').DataTable({
	    "responsive": true,
	    "processing": true,
	    "serverSide": true,
	    "order": [[ 0, "desc" ]],
	    "ajax": url, 
	    "columns": [
	            { data: "id", name:"id"},
	            { data: "created_at" , name:"created_at", },
	            { data: "brand_name" , name:"brand_name"},
                {data: "action"}
	            ],            
	        colReorder: true
	});
