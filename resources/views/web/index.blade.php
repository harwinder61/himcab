@extends('layouts.web')

@section('content')

<style type="text/css">
	.entry {
  position: relative;
  overflow: hidden;
  margin: 30px 0;
  padding: 20px 20px 4em 20px;
  background: #FFF;
  font-family: "Open Sans", sans-serif;
  box-shadow: 0 0 15px #999;
}
 
.entry-title,
.entry-title a {
  margin-top: 0;
  font-family: Oswald, sans-serif;
  color: #333;
  text-decoration: none;
}
 
.entry-title a:hover {
  color: #ff0047;
}
 
.more-link {
  position: absolute;
  left: 0;
  bottom: 0;
  display: block;
  width: 100%;
  padding: 8px;
  background: #ff0047;
  color: #FFF;
  text-align: center;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: bold;
  box-shadow: 0 0 10px #000;
}
 
.more-link:hover {
  background: #e60023;
}
 
.more-link:after {
	content: "\2193";
	margin-left: 8px;
	font-size: .8em;
}
 
.more-link.open:after {
	content: "\2191";
}


.blog a:hover {
    background-color: #063a80;
}
.blogpage_1 img {
    position: relative;
    display: block;
    object-fit: cover;
    width: 400px;
    height: 320px;
}
</style>
<!--slider -->
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-7 text">
				<h1>HIMCabIndia service that only cares about YOU. </h1>
				<p>We provide the best & cheapest rides in town</p>
				<a href="{{url('/blog')}}">Learn More</a>
			</div>
			<div class="col-md-5 city">
				<div class="city_form">
					<p><span></span></p>
					<nav class="cab-type-nav">
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CITY TAXI </a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">OUTSTATION</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">RENTALS</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><form class="fff">
						<div class="form-group">
							<input type="pickup location" class="form-control" id="location" placeholder="Pickup location">
								  </div>
								  <div class="form-group">
									<input type="drop location" class="form-control" id="drop_location" placeholder="Drop Location">
								  </div>
								  <div class="form-group">
									<input type="date" class="form-control" id="date" placeholder="Now">
								  </div>
								  <button type="submit" class="btn btn-primary">Search</button></form>
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <form>
						<div class="form-group">
							<input type="pickup location" class="form-control" id="location" placeholder="Pickup location">
								  </div>
								  <div class="form-group">
									<input type="drop location" class="form-control" id="drop_location" placeholder="Drop Location">
								  </div>
								  <div class="form-group">
									<input type="date" class="form-control" id="date" placeholder="Now">
								  </div>
								  <button type="submit" class="btn btn-primary">Search</button></form>     
							</div>
							<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><form>
						<div class="form-group">
							<input type="pickup location" class="form-control" id="location" placeholder="Pickup location">
								  </div>
								  <div class="form-group">
									<input type="drop location" class="form-control" id="drop_location" placeholder="Drop Location">
								  </div>
								  <div class="form-group">
									<input type="date" class="form-control" id="date" placeholder="Now">
								  </div>
								  <button type="submit" class="btn btn-primary">Search</button></form>    </div>						
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<!--your_car -->
<div class="car">
	<div class="container">
		<center><h2>Sele<span>ct You</span>r Car</h2></center>
		<div class="your_car">
			<center>	
				<div class="w3-content" style="max-width:800px">
					 
					 <img class="mySlides" src="{{url('/web/images/car.png')}}" style="width:100%">
					 <img class="mySlides" src="{{url('/web/images/car_2.png')}}" style="width:100%">
					 <img class="mySlides" src="{{url('/web/images/car_3.png')}}" style="width:100%">
				</div>
				<div class="town">
					<button class="w3-button demo" onclick="currentDiv(1)">Town Taxi</button> 
					<button class="w3-button demo" onclick="currentDiv(2)">Hybrid Taxi</button> 
					<button class="w3-button demo" onclick="currentDiv(3)">SUV Taxi</button> 
				</div>
			</center>
		</div>
	 </div>
</div>	  
 <!-- about us -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6 taxi">
				<img src="{{url('/web/images/taxi.png')}}" alt="taxi" class="img-fluid">
			</div>
		    <div class="col-md-6 ab_us">
			   <h2><span>About</span> us</h2>
			   <p>HIM cab app could be a international Travel Technology Company. We have launched our product HIM cab app that is authorized with all pre associate degree post booking options and offers all needed solutions for an OTA, travel company and travel agents on a one table. Our Vision is to convey world catagory travel arrangements and tackle the various key problems confronted in the online travel world.</p>							
				<a href="{{url('/about')}}">Read More</a>
		    </div>
		</div>
	</div>
</div>	
<!-- blog-->
<div class="blog">
		<center><h2>O<span>ur Blo</span>g</h2>
		</center>						
	<div class="container">
		
			<div id="content">
				<div class="row">
					@if(isset($blog_list))
						@foreach($blog_list as $value)
							<div class="col-md-4 blog_1 post type-post status-publish format-standard hentry category-uncategorized">
								<div class="entry">
									<img src="{{url('/public/blog/')}}/{{$value->image}}" alt="image" class="img-fluid">
									<div class="entry-content">
										<!-- <p>{{ $value->blog}} </p> -->
										<p><?php echo $value->blog; ?></p>
									</div>
									<!-- <a href="{{url('/blog')}}">Read More</a> -->
								</div>
							</div>	
						@endforeach
					@endif
				</div>
			</div>
			<!-- <div class="col-md-4 blog_2">
				
				<img src="{{url('/web/images/bl_2.jpg')}}" alt="image" class="img-fluid">
				<p>Chandigarh is understood because the City Beautiful Chandigarh may be a planned fashionable town </p>
				
				<a href="{{url('/blog')}}">Read More</a>
			</div>
			<div class="col-md-4 blog_2">
				<img src="{{url('/web/images/bl_3.jpg')}}" alt="image" class="img-fluid">
				<p>Our driver-partners are the center and soul of HIM cab delivers a reliable and safe cab service. </p>
				
				<a href="{{url('/blog')}}">Read More</a>
			</div> -->
		
	</div>
</div>
	
<!-- contact us -->
<div class="contact">
    <div class="container">
		<h2><span>Conta</span>ct Us</h2>
		<div class="row">								
			<div class="col-md-6 con_form">
				 <form action="#">
					<div class="row">
						 <div class="col-sm-6 name">
							<input type="text" class="form-control" id="name" placeholder="Name" name="name">
						 </div>
						 <div class="col-sm-6 name">
							<input type="text" class="form-control" id="email" placeholder="Email" name="email">
						 </div>
					</div>					
					<div class="row">							  
					    <div class="col-sm-6 name">
						    <input type="subject" class="form-control" id="subject" placeholder="Subject" name="subject">
					    </div>				
						<div class="col-sm-6 name">
							<input type="phone" class="form-control" id="phone" placeholder="Phone No." name="phone" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'');" maxlength="11">
						</div>
					</div>																	
					<div class="row">								
					<div class="col-sm-12 name">
						<!-- <input type="message-box" class="form-control" id="message" placeholder="Message" name="message"> -->
						<textarea class="form-control" id="message" name="message"  placeholder="Message" rows="5"></textarea>
					</div>
					</div>															
					<button type="Send" class="btn btn-primary mt-3"><strong>SEND</strong></button>
				</form>							
			</div>												
			<div class="col-md-6 ab_us">
				<img src="{{url('/web/images/taxi_new.png')}}" alt="taxi" class="img-fluid">
			</div>
		</div>	
	</div>
</div>	

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
	// Code By Webdevtrick ( https://webdevtrick.com )
$(document).ready(function() {
  var closeHeight = '10em'; 
	var moreText 	= 'Read More'; 
	var lessText	= 'Read Less';
	var duration	= '1000';
  var easing = 'linear'; 

	$('.page-template-page_blog-php #content .entry, .container #content .entry').each(function() {
		
		var current = $(this).children('.entry-content');
		current.data('fullHeight', current.height()).css('height', closeHeight);

		current.after('<a href="javascript:void(0);" class="more-link closed">' + moreText + '</a>');

	});
  
	var openSlider = function() {
		link = $(this);
		var openHeight = link.prev('.entry-content').data('fullHeight') + 'px';
		link.prev('.entry-content').animate({'height': openHeight}, {duration: duration }, easing);
		link.text(lessText).addClass('open').removeClass('closed');
    	link.unbind('click', openSlider);
		link.bind('click', closeSlider);
	}

	var closeSlider = function() {
		link = $(this);
    	link.prev('.entry-content').animate({'height': closeHeight}, {duration: duration }, easing);
		link.text(moreText).addClass('closed').removeClass('open');
		link.unbind('click');
		link.bind('click', openSlider);
	}
  
	$('.more-link').bind('click', openSlider);
  
});
</script>

@endsection