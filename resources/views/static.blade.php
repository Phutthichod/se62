@extends('template.layout')

@section('title','pinto')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<h1>สถิติ</h1>
<form class="w3-white w3-text-grey w3-card-4 p-3" action="/static/search" method="get">
    <hr>
    <div class="row" >
    <div class="col-md-3 mb-5">
        <label for="year">ปี</label>
            <select class="custom-select d-block w-100" name="year" >
                <option value=>ทุกปี</option>
				<option value="2557">2557</option>
				<option value="2558">2558</option>
				<option value="2559">2559</option>
				<option value="2560">2560</option>
				<option value="2561">2561</option>
				<option value="2562">2562</option>
				<option value="2563">2563</option>
			</select>
    </div>
    <div class="col-md-3 mb-5">
        <label for="month">เดือน</label>
            <select class="custom-select d-block w-100" name="month" >
                <option value>ทุกเดือน</option>
                <option value="1">ม.ค.</option>
                <option value="2">ก.พ.</option>
                <option value="3">มี.ค.</option>
                <option value="4">เม.ษ.</option>
                <option value="5">พ.ค.</option>
                <option value="6">มิ.ย.</option>
                <option value="7">ก.ค.</option>
                <option value="8">ส.ค.</option>
                <option value="9">ก.ย.</option>
                <option value="10">ต.ค.</option>
                <option value="11">พ.ย.</option>
                <option value="12">ธ.ค.</option>
			</select>
        </div>
        <div class="col-md-3 mb-5">
        <label for="catagories">หมวดหมู่</label>
            <select class="custom-select d-block w-100" name="catagories" >
                <option value=>ทุกหมวดหมู่</option>
                @foreach($catAll as $cat)
              <option value={{$cat->id}}>{{$cat->name}}</option>
                @endforeach
			</select>
        </div>
        <div class="col-md-3 mb-5">
            <label for="year">ประเภทผู้ใช้</label>
                <select class="custom-select d-block w-100" name="permission" >
                    <option value="">ทุกคน</option>
                    <option value="Student">นิสิต</option>
                    <option value="Teacher">อาจารย์</option>
                    <option value="Other">บุคลากร</option>
                </select>
        </div>

    </div>
        <div class="form-grop">
				<button type="submit"  id="filter" class="btn btn-info">Filter</button>
				<button type="reset"  id="reset" class="btn btn-primary">Reset</button>
		</div>
        <br>
    </div>
</form>
<br>
<br>
    {{-- <H1 align="center">มีการยืมทั้งหมด {{}}</H1> --}}
<br>
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-container">
        <hr>
        <?php  $i;
        for($i = sizeof($staticAll)-1 ; $i >= 0 ; $i--){ ?>
        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i><?= $staticAll[$i]['access']->name?> หมวดหมุ่ {{$staticAll[$i]['access']->catagories->name}}</b></p>
        <p>ถูกยืม <?= $staticAll[$i]['sum'] ?> ครั้ง</p>
        <div class="w3-light-grey w3-round-xlarge w3-small">
          <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?= $staticAll[$i]['per'] ?>%"><?= $staticAll[$i]['per']  ?>%</div>
        </div><br>
        <?php } ?>
      </div>
    </div><br>
<script>
    $('select[name=year]').val("<?php if(isset($_GET['year'])) echo $_GET['year']; ?>")
    $('select[name=month]').val("<?php if(isset($_GET['month'])) echo $_GET['month']; ?>")
    $('select[name=catagories]').val("<?php if(isset($_GET['catagories'])) echo $_GET['catagories']; ?>")
    $('select[name=permission]').val("<?php if(isset($_GET['permission'])) echo $_GET['permission']; ?>")
</script>
@endsection
