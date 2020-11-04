<!---footer-->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 him">
				<img src="{{url('/web/images/logo.png')}}"  alt="company-logo" class="img-fluid"/>
				<p>HIM Cab India service that only cares about YOU. We provide the best & cheapest rides in town
						Happy Times Are Coming Soon!</p>
			</div>			
			<div class="col-md-2 links">
				<ul>
					<h5>User Links</h5>
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('/car')}}">Cars</a></li>
					<li><a href="{{url('/about')}}">About</a></li>
					<li><a href="{{url('/blog')}}">Blog</a></li>
					<li><a href="{{url('/contact')}}">Contact Us</a></li>
					<li><a href="{{url('/book')}}">Book Now</a></li>
				</ul>
			</div>											
			<div class="col-md-4 info">
				<ul>
				    <h5>Contact Info</h5>
					<li class="fa fa-map-marker" aria-hidden="true"><span>VPO Sunehar, Teh. Nagrota Bhagwan Distt. 		kangra (HP) <br>Pin Code :- 176056</span></li>
					<li class="fa fa-phone" aria-hidden="true"><span>+91-7807885974</span></li>
					<li class="fa fa-envelope" aria-hidden="true"><span>info@himcabindia.com</span></li>
				</ul>
			</div>		
			<div class="col-md-3 google">
				<h5>Download Mobile App</h5>
				<a href="https://play.google.com/store?hl=en_IN"><img src="{{url('/web/images/google_play.png')}}" alt="google play" class="img-fluid"></a>
			</div>
		</div>
		<div class="copy">
		<center><p>Copyright @2020 By Him Cab India Pvt. Ltd.</p><center></div>
	</div>
</div>
<script>
						var slideIndex = 1;
						showDivs(slideIndex);

						function plusDivs(n) {
						  showDivs(slideIndex += n);
						}

						function currentDiv(n) {
						  showDivs(slideIndex = n);
						}

						function showDivs(n) {
						  var i;
						  var x = document.getElementsByClassName("mySlides");
						  var dots = document.getElementsByClassName("demo");
						  if (n > x.length) {slideIndex = 1}    
						  if (n < 1) {slideIndex = x.length}
						  for (i = 0; i < x.length; i++) {
							x[i].style.display = "none";  
						  }
						  for (i = 0; i < dots.length; i++) {
							dots[i].className = dots[i].className.replace(" w3-red", "");
						  }
						  x[slideIndex-1].style.display = "block";  
						  dots[slideIndex-1].className += " w3-red";
						}
				</script>
	
	
	
  </body>
</html>