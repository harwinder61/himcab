@extends('layouts.web')

@section('content')

<div class="book_banner">
		<div class="row">
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
			<div class="col-md-7 book_text">
				<h2>We provide the best & cheapest rides in town</h2>
				<p>Happy Times Are Coming Soon!</p>
			</div>
		</div>
</div>

@endsection