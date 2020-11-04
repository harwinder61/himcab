<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-site-verification" content="96OQX9JQZ-cT6Sz2HkuJGH0wH_LKrCQSOsGf4unpgYw"/>
<title>Himcabindia</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--fafa icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- styel.css-->
<!-- Favicon -->
    <link rel="icon" href="{{url('/web/images/favicon.png')}}">
<link rel="stylesheet" href="{{url('/web/css/style.css')}}">
<!--sript -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</head>
  
<body>
<div class="header">
	<div class="container">
		<div class="row">
		        <!-- logo -->					  
			<div class="col-md-3 logo" class="pull-left">
				<a class="navbar-brand" href="{{url('/')}}"> 
				<img src="{{url('/web/images/logo.png')}}"  alt="company-logo" class="img-fluid"/></a>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light col-md-9 menu">
			   <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target=  "#navbarNavAltMarkup" 	aria-controls  =  "navbarNavAltMarkup" aria-expanded="false"   aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>																			 				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						@if(Request::path() == '/')
							<a class="nav-item nav-link active" href="{{url('/')}}">Home <span class=  "sr-only">(current)</span></a>
						@else
							<a class="nav-item nav-link" href="{{url('/')}}">Home <span class=  "sr-only">(current)</span></a>
						@endif
						@if(Request::path() == 'car')
						<a class="nav-item nav-link active" href="{{url('/car')}}">Cars</a>
						@else
						<a class="nav-item nav-link" href="{{url('/car')}}">Cars</a>
						@endif

						@if(Request::path() == 'about')
						<a class="nav-item nav-link active" href="{{url('/about')}}">About</a>
						@else
						<a class="nav-item nav-link" href="{{url('/about')}}">About</a>
						@endif
						@if(Request::path() == 'blog')
							<a class="nav-item nav-link active" href="{{url('/blog')}}">Blog</a>
						@else
							<a class="nav-item nav-link" href="{{url('/blog')}}">Blog</a>
						@endif
						@if(Request::path() == 'contact')
							<a class="nav-item nav-link active" href="{{url('/contact')}}">Contact Us</a>
						@else
							<a class="nav-item nav-link" href="{{url('/contact')}}">Contact Us</a>
						@endif
						@if(Request::path() == 'book')
							<span id="book"><a class="nav-item nav-link active" href="{{url('/book')}}">Book Now</a></span>
						@else
						<span id="book"><a class="nav-item nav-link" href="{{url('/book')}}">Book Now</a></span>
						@endif
						<span id="mobile"><a class="fa fa-phone" aria-hidden="true" href="#"></a>+91-7807885974</span>
					</div>
				</div>
			</nav>
		</div>
    </div>
</div>
