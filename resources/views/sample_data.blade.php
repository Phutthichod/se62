<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">    
  			<br />
  			<br />
  			<br />
			<div class="table-responsive">
				<table id="user_table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="19%">id</th>
				            <th width="19%">firstName</th>
							<th width="19%">lastName</th>
							<th width="19%">status</th>
				            <th width="19%">date_borrow</th>
				            <th width="5%">Action</th>
						</tr>
					</thead>
				</table>
			</div>
			<br />
			<br />
		</div>
	</body>
</html>





<script>
$(document).ready(function(){

	$('#user_table').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('sample.index') }}",
		},
		columns: [
			{
				data: 'id',
				name: 'id'
			},
			{
				data: 'firstName',
				name: 'firstName'
			},
			{
				data: 'lastName',
				name: 'lastName'
			},
			{
				data: 'status',
				name: 'status'
			},
			{
				data: 'date_borrow',
				name: 'date_borrow'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false
			}
		]
	});


});
</script>

