
    var url    = $("#baseurl").val()+'/admin/get-category-api';
	$('#categories-table').DataTable({
	    "responsive": true,
	    "processing": true,
	    "serverSide": true,
	    "order": [[ 0, "desc" ]],
	    "ajax": url, 
	    "columns": [
	            { data: "id", name:"id"},
	            { data: "created_at" , name:"created_at", },
	            { data: "brand.brand_name" , name:"brand.brand_name"},
	            { data: "category_name" , name:"category_name"},
                {data: "action"}
	            ],            
	        colReorder: true
	});
