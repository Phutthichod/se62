<nav class="navbar navbar-dark nav-top">
</nav>
<nav class="navbar navbar-expand-lg  nav-content nav-body">
  @if (session()->has('member'))
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
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    @if(session()->get('member')['Admin'] != 1 || session()->get('permission') != 1)

    <!-- Code Default -->
    <!-- <div class="menu">
      <div class="nav-icon">
        <i class="fas fa-shopping-basket dropdown">
          <sup><span class="badge badge-pill badge-danger">1</></sup>
        </i>
        <span>ตะกร้า</span>
      </div>
      <div class="nav-icon">
        <i class="fas fa-clipboard-list">
          <sup><span class="badge badge-pill badge-danger">1</span></sup>
        </i>
        <span>รายการยืม</span>
      </div>
      <div class="nav-icon">
        <i class="fas fa-bell">
          <sup><span class="badge badge-pill badge-danger">1</span></sup>
        </i>
        <span>แจ้งเตือน</span>
      </div>
    </div> -->

    <ul class="navbar-nav ml-auto menu" style="display: flex;">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Nav Item - ตะกร้า -->
      <li class="nav-item dropdown no-arrow mx-1 show">

        <a class="nav-link dropdown-toggle nav-icon" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fas fa-shopping-basket dropdown">
            <sup><span class="badge badge-pill badge-danger">1</></sup>
          </i>
          <span style="color: black;">ตะกร้า</span>
        </a>

        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="width: 20rem!important;" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Alerts Center
          </h6>

          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 12, 2019</div>
              <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 7, 2019</div>
              $290.29 has been deposited into your account!
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 2, 2019</div>
              Spending Alert: We've noticed unusually high spending for your account.
            </div>
          </a>

          <a class="dropdown-item text-center small text-gray-500" href="/chart">Show All Alerts</a>
        </div>

      </li>

      <!-- Nav Item - รายการยืม -->
      <li class="nav-item dropdown no-arrow mx-1 show">

        <a class="nav-link dropdown-toggle nav-icon" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fas fa-clipboard-list">
            <sup><span class="badge badge-pill badge-danger">1</span></sup>
          </i>
          <span style="color: black;">รายการยืม</span>
        </a>

        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="width: 20rem!important;" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Alerts Center
          </h6>

          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 12, 2019</div>
              <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 7, 2019</div>
              $290.29 has been deposited into your account!
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 2, 2019</div>
              Spending Alert: We've noticed unusually high spending for your account.
            </div>
          </a>

          <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>

      </li>

      <!-- Nav Item - แจ้งเตือน -->
      <li class="nav-item dropdown no-arrow mx-1 show">

        <a class="nav-link dropdown-toggle nav-icon" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fas fa-bell">
            <sup><span class="badge badge-pill badge-danger">1</span></sup>
          </i>
          <span style="color: black;">แจ้งเตือน</span>
        </a>

        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="width: 20rem!important;" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Alerts Center
          </h6>

          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 12, 2019</div>
              <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 7, 2019</div>
              $290.29 has been deposited into your account!
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" style="white-space: normal;" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 2, 2019</div>
              Spending Alert: We've noticed unusually high spending for your account.
            </div>
          </a>

          <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>

      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

    </ul>

    @else
    <div class="menu-2">
      <div class="nav-icon"><i class="fas fa-toolbox"></i><span>อุปกรณ์</span></div>
      <div class="nav-icon"><i class="fas fa-clipboard-list"></i><span>ประวัติ</span></div>
      <div class="nav-icon"><i class="fas fa-exclamation"></i><span>ยืมเกิน</span></div>
      <div class="nav-icon"><i class="fas fa-chart-bar"></i><span>สถิติ</span></div>
      <div class="nav-icon"><i class="fas fa-bell"></i><span>แจ้งเตือน</span></div>
    </div>

    @endif
    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown profile">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <img class="img-xs rounded-circle ml-2 img-profile" src="{{asset(session()->get('icon'))}}" alt="Profile image"> <span class="font-weight-normal">{{session()->get('member')['thainame']}}</span></a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
        <div class="dropdown-header text-center">
          <img class="img-md rounded-circle img-profile" src="{{asset(session()->get('icon'))}}" alt="Profile image">
          <p class="mb-1 mt-3">{{session()->get('member')['thainame']}}</p>
          <p class="font-weight-light text-muted mb-0">{{session()->get('member')['mail'][0]}}</p>
        </div>
        <a class="dropdown-item" href="/profile"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <sup><span class="badge badge-pill badge-danger">1</span></sup></a>
        @if(session()->get('member')['Admin'] == 1)
        @if(session()->get('permission') != 1)
        <a class="dropdown-item" href="/index/1"><i class="dropdown-item-icon icon-user text-primary"></i>AdminMode</a>
        @else
        <a class="dropdown-item" href="/index/0"><i class="dropdown-item-icon icon-user text-primary"></i>GeneralMode</a>
        @endif
        @endif
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