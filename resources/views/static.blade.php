@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
{{-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<h1>สถิติ</h1>
<form class="w3-white w3-text-grey w3-card-4 p-3" action="/static/search" method="get">
    <hr>
    <div class="row" >
    <div class="col-md-3 mb-5">
        <label for="year">ปี</label>
            <select class="custom-select d-block w-100" name="year" >
                <option value=""></option>
				<option value="">2557</option>
				<option value="">2558</option>
				<option value="">2559</option>
				<option value="">2560</option>
				<option value="">2561</option>
				<option value="">2562</option>
				<option value="">2563</option>
			</select>
    </div>
    <div class="col-md-3 mb-5">
        <label for="month">เดือน</label>
            <select class="custom-select d-block w-100" name="month" >
                <option value=""></option>
				<option value="">ม.ค.</option>
				<option value="">ก.พ.</option>
				<option value="">มี.ค.</option>
				<option value="">เม.ษ.</option>
				<option value="">พ.ค.</option>
				<option value="">มิ.ย.</option>
				<option value="">ก.ค.</option>
                <option value="">ส.ค.</option>
                <option value="">ก.ย.</option>
                <option value="">ต.ค.</option>
                <option value="">พ.ย.</option>
                <option value="">ธ.ค.</option>
			</select>
        </div>
        <div class="col-md-3 mb-5">
        <label for="catagories">หมวดหมู่</label>
            <select class="custom-select d-block w-100" name="catagories" >
                <option value=""></option>
			</select>
        </div>
        <div class="col-md-3 mb-5">
            <label for="year">ประเภทผู้ใช้</label>
                <select class="custom-select d-block w-100" name="permission" >
                    <option >ทุกคน</option>
                    <option value="Student">นิสิต</option>
                    <option value="Teacher">อาจารย์</option>
                    <option value="Other">บุคลากร</option>
                </select>
        </div>

    </div>
        <div class="form-grop">
				<button type="submit" name ="filter" id="filter" class="btn btn-info">Filter</button>
				<button type="button" name ="filter" id="reset" class="btn btn-primary">Reset</button>
		</div>
        <br>
    </div>
</form>
<br>
<br>
    <H1 align="center"> ปี xxxx เดือน xxxx </H1>
<br>
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-container">
        <hr>

        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>อุปกรณ์</b></p>
        <p>คอม</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
        </div><br>
        <p>เมาส์</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
            <div class="w3-center w3-text-white">80%</div>
          </div>
        </div><br>
        <p>ฟหกฟหก</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
        </div><br>
        <p>ฟกฟหกฟก</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
        </div>
        <br>
      </div>
    </div><br>

@endsection
