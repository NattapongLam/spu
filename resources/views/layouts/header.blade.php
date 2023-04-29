<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">
          @csrf
        </form>
        <a class="nav-link" data-toggle="dropdown" href="{{ route('login')}}"  onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
          <i class="fas fa-skating"></i>
          </a>
      </li>
      <li class="nav-item">       
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>     
    </ul>
  </nav>