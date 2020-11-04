<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   HimCab
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{url('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{url('/assets/demo/demo.css')}}" rel="stylesheet" />
  <style type="text/css">
    
    body {
 background-image: url("public/admin/car_new.gif");
 /*opacity: 0.5;*/
 /*background-color: #cccccc;*/
}
.card {
    box-shadow: 0 1px 4px 0 rgb(0 0 0 / 86%) !important;
        width: 90%!important;
    height: 100%!important;
    margin-top: 48px !important;
}
.btn.btn-primary {
    color: #080808!important;
    background-color: #d6d664!important;
    border-color: #9c27b0!important;
    box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14), 0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12)!important;
}
  </style>
  
</head>

<body>
    <div id="app">
       <!--  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               
            </div>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
