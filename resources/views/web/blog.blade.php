@extends('layouts.web')

@section('content')
<style>
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

.entry img {
    position: relative;
    display: block;
    object-fit: cover;
    width: 310px;
    height: 172px;
}

.blog a:hover {
    background-color: #063a80;
}

</style>
<!--banner -->
<div class="blog_banner">
	<div class="container">
		<h2>Our Blog</h2>
		<p>Happy Times Are Coming Soon!</p>
	</div>
</div>

@if(isset($blog_list))
	@foreach($blog_list as $key => $value)
		<div class="blogs">
			<div class="container">
				<div class="row">
					<div class="col-md-4 blogpage_1">
						<img src="{{url('/public/blog/')}}/{{$value->image}}" alt="taxi" class="img-fluid">
					</div>
					<div class="col-md-8 blogpage_text">
						<p><?php echo $value->blog; ?></p>
						
						<h6><?php 
							$date=date_create($value->created_at);
							echo date_format($date,"M,d,Y");
						?></h6>

						<a href="{{url('/SingleBlog')}}/{{$value->url}}">Read More</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach

@else
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-4 blogpage_1">
				<!-- <img src="{{url('/web/images/blog_img.jpg')}}" alt="taxi" class="img-fluid"> -->
			</div>
			<div class="col-md-8 blogpage_text d-flex flex-wrap align-content-center">
				<p>No Blog Found </p>
				<!-- <h6>Oct,08,2020</h6>
				<a href="{{url('/blog')}}">Read More</a> -->
			</div>
		</div>
	</div>
</div>
@endif
<!--blogs_2-->
<!-- <div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-6 blogpage_text d-flex flex-wrap align-content-center">
				<p>Chandigarh is understood because the ‘City Beautiful’, Chandigarh may be a planned fashionable town stuffed with stunning gardens and active searching  streets. Its well-maintained gardens and therefore the bewitching Sukhna Lake area unit among the numerous attractions that create this stunning inexperienced town distinctive. Because it is the entrance way to major traveler destinations within the country, availing cab services helps you to explore the picturesque landscapes on your journey. With HIM cab booking website services in Chandigarh, you will be able to stop anyplace in between for feeding and exploring.</p>
				<h6>Oct,12,2020</h6>
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
				<p>In a bid to produce an end-to-end contactless journey to air travelers, HIM cab service is reliable and safe cab service to produce ultra-sanitized cab services across all major airports in republic of India. The corporate aims to continue extending a seamless and connected travelling expertise  on a one platform – from booking flight tickets to experiencing a secure and contactless cab journey, with large stress on the hygiene, reliable and safe cab service of travelers.</p>
				<h6>Oct,13,2020</h6>
				<a href="{{url('/blog')}}">Read More</a>
			</div>
		</div>
	</div>
</div> -->

<nav aria-label="...">
	<div class="container">
		<div class="text-center">
			{{ $blog_list->links() }}
		</div> 
	<!--   <ul class="pagination">
	    <li class="page-item disabled">
	      <a class="page-link" href="{{url('/blog')}}" tabindex="-1">Previous</a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#!">1</a></li>
	    <li class="page-item">
	      <a class="page-link" href="{{url('/blognew')}}">2 <span class="sr-only">(current)</span></a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#!">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#!">Next</a>
	    </li>
	  </ul> -->
	</div>
</nav>

@endsection