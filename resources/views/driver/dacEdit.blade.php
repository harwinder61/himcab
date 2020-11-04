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
		   <a href="{{url('/home')}}">dashboard</a>/<a href="{{url('/driver')}}">driver Listing</a>
            <div class="card">
              <div class="card-header card-header-primary p-2">
					<h4>Update document</h4>
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
			 
	            <form class="form-horizontal" method="post" action="{{url('/updateDocument')}}" id="profile_form" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group row">
				   <input type="hidden"  name="id" value="{{$id}}">
	                <label for="username" class="col-sm-3 col-form-label bmd-label-floating">Vehicle insurance</label>
	                <div class="col-sm-9">
	                  <input type="file" class="form-control" required id="vehicle_insurance" name="vehicle_insurance" placeholder="">
	                </div>
	              </div>
				
	              <div class="form-group row">
	                <label for="inputEmail" class="col-sm-3 col-form-label bmd-label-floating">Driving license</label>
	                <div class="col-sm-9 ">
	                  <input type="file" name="driving_license" required class="form-control" id="inputEmail" placeholder="" >
	                </div>
	              </div>
                <div class="form-group row">
                  <label for="inputPhone" class="col-sm-3  col-form-label bmd-label-floating">Driver id proof</label>
                  <div class="col-sm-9 ">
                    <input type="file" name="driver_id_proof" required class="form-control" id="inputEmail" placeholder="" >
                  </div>
                </div>
				
				
	              <div class="form-group row">
	                <div class="offset-sm-2 col-sm-10">
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
