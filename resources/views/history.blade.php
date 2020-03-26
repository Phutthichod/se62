@extends('template.layout')

@section('title','pinto')

@section('content')

<style>
	.set_Object_left {
		text-align: left;
	}

	.set_Object_Right {
		text-align: right;
	}

	.set_Object_Center {
		text-align: center;
	}
</style>

<div class="container">

	<div class="row mt-4">
		<div class="col-xl-12 col-12">
			<div class="card">
				<div class="card-header card-bg">
					<div>
						<strong style="float: left;">ประวัติการยืม - คืน</strong>
					</div>
				</div>
				<div class="card-body">
					<?php
						$th = ['id','firstName','lastName','status','date_borrow','Action'];
				
                        createTable('tableFer',$th,$tb);
                    ?>
					
				</div>
			</div>
		</div>
	</div>

	<!-- '<"row"<"col-sm-6"B>>' + -->
</div>
<script>
	$(document).ready(function() {
		$('.status1').select2();
		$('.status2').select2();
		$("#datatable").DataTable({
			dom: '<"row"<"col-sm-6 set_Object_left"l><"col-sm-6"f>>' +
				'<"row"<"col-sm-12"tr>>' +
				'<"row"<"col-sm-5 set_Object_left"i><"col-sm-7"p>>'
		});
	});
	$('#tableFer').DataTable({
    "scrollx":true
     });
</script>
@endsection
