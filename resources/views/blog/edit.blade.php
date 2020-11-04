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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary p-2">
					<h4>Edit Blog</h4>
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
			 
	           <form class="form-horizontal" method="post" action="{{url('/updateBlog')}}" id="profile_form" enctype="multipart/form-data">
	            	@csrf
                 <div class="form-group row ">
                  <label for="inputPhone" class="col-sm-3 col-form-label bmd-label-floating">Title</label>
                  <div class="col-sm-9">
                    <input type="text" name="title"  class="form-control" id="inputPhone" placeholder="Title" value="{{$blogdetail->title}}">
                  </div>
                </div>
	              <div class="form-group row">
	               <!--  <label for="username" class="col-sm-3 col-form-label bmd-label-floating">Blog</label> -->
	                <div class="col-sm-12">
	                  
                    
                     <textarea name="blog" class="form-control" id="ckeditor"><?php echo $blogdetail->blog; ?></textarea>
	                </div>
	              </div>
				    <input type="hidden"  name="blog_id" value="{{$blogdetail->id}}">
				
	              
                
				
			
		
				
			   @if($blogdetail->image)
				<img src="{{url('/public/blog/')}}/{{$blogdetail->image}}" height="50px" width="50px" alt = "blog">
			    @else
				N/A	
               	
				@endif
				
				<div class="form-group row ">
				
                  <label for="inputPhone" class="col-sm-3 col-form-label bmd-label-floating">Image</label>
                  <div class="col-sm-9">
                    <input type="file" name="image"  class="form-control" id="inputPhone" placeholder="" value="{{old('image')}}">
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
   <script src="{{url('/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{url('/assets/js/editors.js')}}"></script>
  <!-- <script src="{{url('/assets/js/ckeditor.js')}}"></script> -->
   <script src="https://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
  <script src="{{url('/assets/js/tinymce.min.js')}}"></script>
@stop
