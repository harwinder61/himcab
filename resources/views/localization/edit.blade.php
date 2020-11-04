@extends('layouts.default')
@section('content')
<style>
.content-wrapper {
    margin: 70px 0 0;
}
.form-group input[type=file] {
    opacity: inherit;
    z-index: inherit;
	/* z-index: 0; */
}
/*switch-btn css*/
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 22px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: #962eaf;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/*switch-btn css*/
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
			<!--<div class="col-md-3">-->
			</div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary p-2">
					<h4>Edit Vehicle</h4>
              </div><!-- /.card-header -->
              <div class="card-body">
			  @if ($errors->any())
             <div class="alert alert-danger">
		     <a href="#" class="close" data-dismiss="alert">&times;</a>
             <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
              </ul>
            </div><br />
            @endif
			<?php    $Localization = \DB::table('localization')->where('id',$id)->first(); ?>
	           <form class="form-horizontal" method="post" action="{{url('/updateLocalization')}}" id="profile_form" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group row ">
                  <label for="inputPhone" class="col-sm-3  col-form-label bmd-label-floating">Country</label>
                  <div class="col-sm-9">
		
                   <select  class="form-control lCountry" name="Country_id" onchange="getvals(this)" required>
				   <option value="">Select Country</option>
				   @foreach($Country as $value )
				  
				   
				  <option value="{{$value->id}}"  {{ $value->id == $Localization->country_id ? 'selected' : ''}} >{{$value->name}}  </option>
				 
				  @endforeach
				   </select>
                </div>
				</div>
				
				<div class="form-group row ">
                  <label for="inputPhone" class="col-sm-3  col-form-label bmd-label-floating">State</label>
                  <div class="col-sm-9">
                   <select  class="form-control state_ids" name="state_id" onchange="getcitys(this)" required >
				  <option value="">Select State</option>
				   @foreach($State as $values )
				  <option value="{{$values->id}}" {{ $values->id == $Localization->state_id ? 'selected' : ''}}  >{{$values->name}}  </option>
				  @endforeach
				  </select>
                </div>
				</div>
				<div class="form-group row ">
                  <label for="inputPhone" class="col-sm-3  col-form-label bmd-label-floating">City</label>
                  <div class="col-sm-9">
                   <select  class="form-control city_ids" name="city_id" required >
				    <option value="">Select City</option>
				
				   @foreach($City as $valuess )
				  <option value="{{$valuess->id}}"   {{ $valuess->id == $Localization->city_id ? 'selected' : ''}} >{{$valuess->name}}  </option>
				  @endforeach
				   </select>
                </div>
				</div>
				
				
	              <div class="form-group row">
	                <div class="offset-sm-2 col-sm-10">
					 <input type="hidden" value="{{$Localization->id}}"  name='id'> 
	                  <button type="submit" class="btn btn-success">Submit</button>
	                </div>
	              </div>
	            </form>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
