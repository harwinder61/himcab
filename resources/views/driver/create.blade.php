@extends('layouts.default')
@section('content')
<style>
.content-wrapper {
    margin: 70px 0 0;
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
            <div class="card">
              <div class="card-header card-header-primary p-2">
					<h4>Create Rider</h4>
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
			 
	            <form class="form-horizontal" method="post" action="{{url('/postUser')}}" id="profile_form"c enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group ">
	                <label for="username" class="col-sm-2 col-form-label bmd-label-floating">Name</label>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}">
	                </div>
	              </div>
				
	              <div class="form-group ">
	                <label for="inputEmail" class="col-sm-2 col-form-label bmd-label-floating">Email</label>
	                <div class="col-sm-10">
	                  <input type="email" name="email"  class="form-control" id="inputEmail" placeholder="" value="{{old('email')}}">
	                </div>
	              </div>
                <div class="form-group ">
                  <label for="inputPhone" class="col-sm-2  col-form-label bmd-label-floating">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone"  class="form-control" id="inputPhone" placeholder="" value="{{old('phone')}}">
                  </div>
                </div>
				<div class="form-group ">
                  <label for="inputPhone" class="col-sm-2 col-form-label bmd-label-floating">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password"  class="form-control" id="inputPhone" placeholder="" value="{{old('password')}}">
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
