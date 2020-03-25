@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<h1>สถิติ</h1>
<div class="w3-white w3-text-grey w3-card-4">
    <hr>
    <div class="row" >
    <div class="col-md-3 mb-5">
        <label for="year">ปี</label>
            <select class="custom-select d-block w-100" id="year" required>
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
            <select class="custom-select d-block w-100" id="month" required>
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
            <select class="custom-select d-block w-100" id="catagories" required>
                <option value=""></option>
			</select>
    </div>
    <div class="col-md-3 mb-5">
        <label for="year">ประเภทผู้ใช้</label>
            <select class="custom-select d-block w-100" id="item" required>
                <option value=""></option>
				<option value="">นิสิต</option>
				<option value="">อาจารย์</option>
				<option value="">บุคลากร</option>
			</select>
    </div>
    
    </div>
        <div class="form-grop">
				<button type="button" name ="filter" id="filter" calss="btn btn-info">Filter</button>
				<button type="button" name ="filter" id="reset" calss="btn btn-default">Reset</button>
			</div>
            <br>
</div>
</div> 
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
