
<nav class="navbar navbar-dark nav-top">
    <!-- Navbar content -->
  </nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-content">
    @if (Session::has('username'))
    <div class="tab"></div>
    <div class="nav-main">
        <div class="logo"><img src="{{ asset('img/KU_SubLogo.png') }}" alt=""></div>
        <strong class="title">ระบบยืมอุปกรณ์</strong>
        <form class="form-inline search">
            <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
            <div class="dropdown show">
                <a class="btn btn-outline-success dropdown-toggle mr-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  หมวดหมู่
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#" >Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
        </form>
        <div class="menu">
            <div class="nav-icon"><i class="fas fa-shopping-basket"><sup class="rounded-circle">2</sup></i><span>ตะกร้า</span></div>
            <div class="nav-icon"><i class="fas fa-clipboard-list"><sup>2</sup></i><span>รายการยืม</span></div>
            <div class="nav-icon"><i class="fas fa-bell"><sup>2</sup></i><span>แจ้งเตือน</span></div>
        </div>
        <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown profile">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle ml-2" src="{{asset('img/profile.png')}}" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{asset('img/profile.png')}}" alt="Profile image">
                <p class="mb-1 mt-3">Allen Moreno</p>
                <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a href="/logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
          </li>
    </div>
    @else
    @if(isset($msg))
        <strong class="ml-5 status-login-fail">{{$msg}}</strong>
    @else
        <strong class="ml-5 status-login">ล็อกอินเพื่อเข้าสู่ระบบ</strong>
    @endif


    @endif
    </nav>
