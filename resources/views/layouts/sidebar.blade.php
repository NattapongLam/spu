<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            @auth
            <a href="#" class="d-block" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">{{auth()->user()->name}}</a>    
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">
                @csrf
            </form>        
            @else
            <a href="{{ route('login')}}" class="d-block">Login</a>            
            @endauth
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">เมนูหลัก</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>บันทึกยืม-คืน</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fas fa-wrench"></i>
                <p>บันทึกแจ้งซ่อม</p>
            </a>           
        </li>
        <li class="nav-header">รายงาน</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>แจ้งซ่อมประจำวัน</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>แจ้งซ่อมประจำเดือน</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>ยืม-คืนประจำวัน</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-area"></i>
                <p>ยืม-คืนประจำเดือน</p>
            </a>           
        </li>
        <li class="nav-header">ตั้งค่า</li>
        <li class="nav-item">
            <a href="{{route('employee.list')}}" class="nav-link {{\Request::routeIs('employee.list') ? 'active' : ''}}">
                <i class="nav-icon fas fa-users"></i>
                <p>พนักงาน</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="{{route('equ-group.list')}}" class="nav-link {{\Request::routeIs('equ-group.list') ? 'active' : ''}}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>กลุ่มวัสดุอุปกรณ์</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>วัสดุอุปกรณ์</p>
            </a>           
        </li>
        <li class="nav-item">
            <a href="{{route('job-site.list')}}" class="nav-link {{\Request::routeIs('job-site.list') ? 'active' : ''}}">
                <i class="nav-icon fas fa-industry"></i>
                <p>ไซต์งาน</p>
            </a>           
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>