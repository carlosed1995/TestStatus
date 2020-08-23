  
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <title>DataTables</title>
    </head>
    <body>
<div class="container">
		<div class="col-md-12">
			<div class="page-header margin-none">
				<h2 class="padding-none">Usuarios</h2>
			</div>
			<div class="table-responsive">					
				<table id='users' class="table">
					<thead>
						<tr>
                            <th scope="col">ID</th>
						    <th scope="col">Nombre</th>
	 						<th scope="col">Email</th>
                             <th scope="col">Estatus</th>
						</tr>
					</thead>
				
				</table>
			 
				 
			 
			</div>
		</div>
	</div>
 
</body> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

<script>
$(document).ready(function() {
    $('#users').DataTable({
        "serverSide": true,
        "ajax": "{{ url('api/users') }}",
        "columns": [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'}, 
            {data: 'atc'},
        ] 
    });
    $("#users").on("click", ".ajax", function(){ 
        event.preventDefault();
        var $isActive = $(this).find('.is-active'); 
        $isActive.text(); 


        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "PATCH",
            url: $(this).attr('action'), 
            dataType: "json",
            data: $(this).serialize(),
            success: function(data) {
            if($isActive.text() == 'Desactivar'){
                $isActive.removeClass("btn-danger");
                $isActive.addClass("btn-success");
                $isActive.text('Activar')
            }else if($isActive.text() == 'Activar'){
                $isActive.removeClass("btn-success");
                $isActive.addClass("btn-danger");
                $isActive.text('Desactivar')

            }
            },
            error: function(data) {
                $isActive.prop('disabled', false);
                alert("Error")
            }
        });
    });
 
   

} );
 

</script>

</html>