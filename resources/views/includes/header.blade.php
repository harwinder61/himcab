
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   HimCab India
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{url('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{url('/assets/demo/demo.css')}}" rel="stylesheet" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
  <style>
  .fixed-plugin {
    display: none;
}
  </style>
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{url('/assets/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="{{url('/home')}}" class="simple-text logo-normal">
          <img src="http://arthtechsolutions.com/himcab/web/images/logo.png" alt="company-logo" class="img-fluid"> 
		 <?php $segment = Request::segment(1);  //field
		       
       ?>  
		  
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($segment == 'home' ){ echo "active" ;}else{  echo ""; } ?> ">
            <a class="nav-link" href="{{url('/home')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
		  
		 
          <li class="nav-item  <?php if($segment == 'users' || $segment == 'createUser' ||  $segment == 'editUser'){ echo "active" ;}else{  echo ""; } ?>" >
            <a class="nav-link" href="{{url('/users')}}">
              <i class="material-icons">person</i>
              <p>Rider</p>
            </a>
          </li>
          <li class="nav-item <?php if($segment == 'driver' || $segment == 'driverHistory' ||  $segment == 'driverDocument'){ echo "active" ;}else{  echo ""; } ?>">
            <a class="nav-link" href="{{url('/driver')}}">
              <i class="material-icons">person</i>
              <p>Driver</p>
            </a>
          </li>
          
          <!-- <li class="nav-item">
		        <a class="nav-link vehicle_new" data-toggle="collapse" data-target="#demo">
              <i class="material-icons">library_books</i>
              <p>Vehicle</p>
              <div id="demo" class="collapse">
                <ul>
                  <li>Vehicle Service</li>
                  <a href="{{url('/vehicle')}}"><li> Vehicle View</li></a>
                </ul>
              </div>
            </a>
          </li> -->
           <li class="nav-item <?php if($segment == 'vehicle' || $segment == 'createVehicle'){ echo "active" ;}else{  echo ""; } ?>">
            <a class="nav-link" href="{{url('/vehicle')}}">
              <i class="material-icons">local_taxi</i>
              <p>Vehicle</p>
            </a>
          </li>

          <li class="nav-item <?php if($segment == 'service' || $segment == 'createService' ||  $segment == 'editService'){ echo "active" ;}else{  echo ""; } ?>">
            <a class="nav-link" href="{{url('/service')}}">
              <i class="material-icons">local_taxi</i>
              <p>Vehicle Service</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{url('/LocalizationList')}}">
              <i class="material-icons">location_ons</i>
              <p>Localization</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/promocode')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Promo Code</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{url('/blogs')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Blog</p>
            </a>
          </li>
         
         <!-- <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li> -->
    
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  
				    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

