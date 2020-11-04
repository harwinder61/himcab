@extends('layouts.web')

@section('content')

<div class="blogs_new_single_page">
	<!-- <center><h2 style="padding: 2rem;">Blog</h2></center> -->
    <div class="blogpage_1 text-center">
        <img src="{{url('/public/blog/')}}/{{$blog_list->image}}" alt="image" class="img-fluid">
    </div>
    
	<div class="container  col-md-8 text-center">
		
			<div class="blogpage_text d-flex flex-column flex-wrap justify-content-around align-content-center mt-3">
				
                <p><?php echo $blog_list->blog; ?>
                    
                </p>
				
			</div>
		
	</div>
</div>
@endsection