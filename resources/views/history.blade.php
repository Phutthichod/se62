@extends('template.layout')

@section('title','pinto')

@section('content')
		<div class ="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<div class="form-group" align="center">
				<select name="fiter_status" id="fiter_status" class="from-control"required>
					<option value="รออนุมัติ">รออนุมัติ</option>
					<option value="รอรับ">รอรับ</option>
					<option value="ยกเลิก">ยกเลิก</option>
					<option value="ไม่อนุมัติ">ไม่อนุมัติ</option>
					<option value="ยืมแล้ว">ยืมแล้ว</option>
					<option value="คืนแล้ว">คืนแล้ว</option>
					<option value="ยืมเกิน">ยืมเกิน</option>
				</select>
			</div>
		</div>
		</div>
        <div class="form-grop" align="center">
				<button type="button" name ="filter" id="filter" calss="btn btn-info">Filter</button>
				<button type="button" name ="filter" id="reset" calss="btn btn-default">Reset</button>
			</div>
            <div class="form-grop" align="right">
				<button type="button" name ="filter" id="filter" calss="btn btn-info">ประวัติอุปกรณ์</button>
				<button type="button" name ="filter" id="reset" calss="btn btn-default">ประวัติรายการ</button>
			</div>
        <div class="container">   
            <div class="container">
                <div class="mt-5">
                    <?php
						$th = ['id','ชื่อ','นามสกุล','status','วันที่ยืม','Action'];
				
                        createTable('tableFer',$th,$tb);
                    ?>
                </div>
            </div>
        </div>
        </body>
</html>
<script>
     $('#tableFer').DataTable({
    "scrollx":true
     });
</script>
@endsection
