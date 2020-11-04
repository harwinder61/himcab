@extends('layouts.web')

@section('content')
<!--your_car -->
<div class="car">
	<div class="container">
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

<!-- blog-->
<div class="blog">
	<div class="container">
		<center><h2>O<span>ur Blo</span>g</h2>
		</center>						
		<div class="row">
			<div class="col-md-4 blog_1">
				
				<img src="{{url('/web/images/bl_1.jpg')}}" alt="image" class="img-fluid">
				<p>Chandigarh is edged by the state of Punjab to the north, the west and also the south, and by the state. </p>
				<!--<h6>july,22,2020</h6>-->
				<a href="{{url('/blog')}}">Read More</a>
			</div>			
			<div class="col-md-4 blog_2">
				
				<img src="{{url('/web/images/bl_2.jpg')}}" alt="image" class="img-fluid">
				<p>Chandigarh is understood because the City Beautiful Chandigarh may be a planned fashionable town </p>
				<!--<h6>july,22,2020</h6>-->
				<a href="{{url('/blog')}}">Read More</a>
			 </div>
			 <div class="col-md-4 blog_2">
				<img src="{{url('/web/images/bl_3.jpg')}}" alt="image" class="img-fluid">
				<p>Our driver-partners are the center and soul of HIM cab delivers a reliable and safe cab service. </p>
				<!--<h6>july,22,2020</h6>-->
				<a href="{{url('/blog')}}">Read More</a>
			 </div>
		</div>
	</div>
</div>		  
@endsection