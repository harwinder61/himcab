@extends('layouts.web')

@section('content')

<!--banner -->
<div class="blog_banner">
	<div class="container">
		<h2>Our Blog</h2>
		<p>Happy Times Are Coming Soon!</p>
	</div>
</div>
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-6 blogpage_1">
				<img src="{{url('/web/images/blog_img.jpg')}}" alt="taxi" class="img-fluid">
			</div>
			<div class="col-md-6 blogpage_text d-flex flex-wrap align-content-center">
				<p>HIM cab provides outstation cab booking services with driver in Chandigarh for day-based rentals, one way, spherical visits, multicity travel and lots of that square measure beaked by custom itinerary or by day.
				Our customers book outstation cab services in Chandigarh for visits to most close cities. AC cabs square measure the foremost snug thanks to travel or from Chandigarh. Since the motive force may be a native, they are accustomed to the routes and this makes it far more convenient than hiring a automobile.  </p>
				<h6>Oct,12,2020</h6>
				<a href="{{url('/blog')}}">Read More</a>
			</div>
		</div>
	</div>
</div>
<!--blogs_2-->
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-6 blogpage_text d-flex flex-wrap align-content-center">
				<p>Comparing and booking cabs for native travel and around republic of India cities on-line can prevent time and energy vs. obtaining multiple native taxi numbers to dial and notice automobile rentals choices on the phone. Use our nice service! You will be able to easily browse costs and select varied classes of cabs.
				Our service will offer you with choice to induce fast automobile rentals around with ease. Additionally to taking the strain out of your journey, HIM cabs mean you will not have to compelled to worry concerning taking the strain out of your travel and infrequently leading to a hassle-free and cozy journey.
				</p>
				<h6>Oct,14,2020</h6>
				<a href="{{url('/blog')}}">Read More</a>
			</div>
			<div class="col-md-6 blogpage_2">
				<img src="{{url('/web/images/blog_img2.jpg')}}" alt="taxi" class="img-fluid">
			</div>
		</div>
	</div>
</div>
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-6 blogpage_3">
				
				<img src="{{url('/web/images/blog_img3.jpg')}}" alt="taxi" class="img-fluid">
			</div>
			<div class="col-md-6 blogpage_text d-flex flex-wrap align-content-center">
				<p>The HIM cab looks to be committed to prioritizing reliable and safe service where as minimizing the exposure of the driver-partner and also the traveler throughout the trip, a slew of tight hygiene measures are enforced by each the brands the least bit points. A number of the protection procedures embody gas cleanup that helps management the unfold of viruses and microorganism within the cab, Isopropanol (IPA) clean up of the cab’s exteriors, temperature check of the driver-partner at the selected cleanup hubs at the airports. </p>
				<h6>Oct,16,2020</h6>
				<a href="{{url('/blog')}}">Read More</a>
			</div>
		</div>
	</div>
</div>

<nav aria-label="...">
	<div class="container">
	  <ul class="pagination">
	    <li class="page-item disabled">
	      <a class="page-link" href="{{url('/blog')}}" tabindex="-1">Previous</a>
	    </li>
	    <li class="page-item"><a class="page-link" href="{{url('/blog')}}">1</a></li>
	    <li class="page-item">
	      <a class="page-link" href="{{url('/blognew')}}">2 <span class="sr-only">(current)</span></a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#!">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#!">Next</a>
	    </li>
	  </ul>
	</div>
</nav>

@endsection