<nav id="sidebar" style="background-color: #fff ">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center" style="background-color: #fff">
      <div class="avatar"><img src="public/doctorimage/" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">{{ auth()->user()->name }}</h1>
        <p>Dokter Mata</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{ url('appointment_view') }}"> <i class="bi bi-alarm"></i>Appointment </a></li>
            <li><a href="{{ url('medicalrecords_view') }}"> <i class="bi bi-journal-medical"></i>Medical Records </a></li>
            <li><a href="forms.html"> <i class="icon-padnote"></i>Profile</a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <li><a href="{{ route('logout') }}"> <i class="icon-logout"></i>Login page </a></li>
          </form>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
  </nav>