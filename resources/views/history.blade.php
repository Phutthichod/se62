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

	<!------------ Start Serch ------------>
	<div class="row mt-4">
		<div class="col-xl-12 col-12">
			<div id="accordion">
				<div class="card">
					<div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="cursor:pointer; background-color: #006765; color: white; text-align: left;">
						<div class="row">
							<div class="col-3">
								<i class="fas fa-search"> ค้นหาขั้นสูง</i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="collapseOne" class="card collapse" aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-12">

							<div class="row mb-4">
								<div class="col-xl-3 col-12 text-right">
									<span>ลักษณะการค้นหา</span>
								</div>
								<div class="col-xl-9 col-12">
									<select id="status1" class="js-example-basic-single form-control">
										<option value='null'>เลือกลักษณะการค้นหา</option>
										<option value="1">ประวัติอุปกรณ์</option>
										<option value="2">ประวัติรายการ</option>
									</select>
								</div>
							</div>

							<div class="row mb-4">
								<div class="col-xl-3 col-12 text-right">
									<span>สถานะ</span>
								</div>
								<div class="col-xl-9 col-12">
									<select id="status2" class="js-example-basic-single form-control">
										<option value='null'>เลือกสถานะ</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
							</div>

							<div class="row mb-4">
								<div class="col-xl-3 col-12 text-right">
									<span>ชื่อผู้ยืม</span>
								</div>
								<div class="col-xl-9 col-12">
									<input id="name" class="form-control"></input>
								</div>
							</div>

							<div class="row mb-4">
								<div class="col-xl-3 col-12 text-right">
									<span>อุปกรณ์</span>
								</div>
								<div class="col-xl-9 col-12">
									<input id="product" class="form-control"></input>
								</div>
							</div>

							<div class="row mb-2 padding">
								<div class="col-12">
									<button type="button" id="btn_search" class="btn btn-success btn-sm form-control">ค้นหา</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!------------ Start Table ------------>
	<div class="row mt-4">
		<div class="col-xl-12 col-12">
			<div class="card">
				<div class="card-header card-bg">
					<div>
						<strong style="float: left;">ประวัติการยืม - คืน</strong>
						<strong style="float: right;">ปี 2563</strong>
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