@extends('layouts.default')
@section('content')
<style>
form a.btn.abc.delete {
    color: #fff;
    background-color: #f44336;
    border-color: #f44336;
}
form a.btn.abc.delete i.fa.fa-trash {
    margin: 0 !important;
}
.delete-conformation-div .bg-danger {
    background-color: #9c27b0 !important;
    color: #fff;
}
.delete-conformation-div .close {
    color: #ffffff;
    text-shadow: 0 1px 0 #6c6a6a;
}
.delete-conformation-div .btn.btn-danger {
    color: #fff;
    background-color: #9c27b0;
    border-color: #9c27b0;
}

</style>

      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
			@if(Session::has('flash_message'))
		    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  {{ Session::get('flash_message') }} 
            </div>
		    @endif 
			  <a href="{{url('/home')}}">dashboard</a>/<a href="{{url('/driver')}}">driver Listing</a>
		   
              <div class="card">
		  
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Driver History</h4>
				  
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                      <th>
                       Vehicle insurance
                        </th>
						<th>
						Driving license
						</th>
						<th>
						Driver id proof
						</th>
						<th>
						Action
						</th>
						
                      </thead>
                        <tbody>
    
					<?php 
							$i = (Request::input('page')) ?  (Request::input('page') -1) * $driverHistory->perPage() + 1 : 1; 
							?>
						@if(count($driverHistory))
						@foreach($driverHistory as $key => $value)
						<tr>
						<td>{{ $i }}</td>
					
						<td >
						<a href="{{url('public/driverdoc')}}/{{$value->vehicle_insurance}}" target="_blank">{{$value->vehicle_insurance}}</a></td>
						<td><a href="{{url('public/driverdoc')}}/{{$value->driving_license}}" target="_blank">
						{{$value->driving_license}}</a></td>
						<td><a href="{{url('public/driverdoc')}}/{{$value->driver_id_proof}}" target="_blank">{{$value->driver_id_proof}}</a></td>
						<td><a href="{{url('driverDocumentEdit')}}/{{$value->id}}" >update</a></td>
						
						</tr>
						<?php $i++; ?>
					@endforeach
					
				@else
					<tr>
						<td colspan="4">No Data yet</td>
					</tr>
				@endif
				
				</tbody>
                    </table>
                  </div>
			<div class="text-center">
			{{ $driverHistory->links() }}
			</div> 
                </div>
              </div>
            </div>
 
          </div>
        </div>
      </div>
	 <div class="modal fade" id="user-modal">
   
    </div>
	<div id="DeleteModal" class="modal fade text-danger delete-conformation-div" role="dialog">
   <div class="modal-dialog" >
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post" >
         <div class="modal-content">
             <div class="modal-header bg-danger">
                
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
				 
                 <p class="text-center dltext">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
  
  <div id="BlockModal" class="modal fade text-danger delete-conformation-div" role="dialog">
   <div class="modal-dialog" >
     <!-- Modal content-->
     <form action="" id="blockForm" method="post" >
         <div class="modal-content">
             <div class="modal-header bg-danger">
                
                 <h4 class="modal-title text-center comfirm">Block CONFIRMATION</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
				 				
                 {{ method_field('DELETE') }}
                 <p class="text-center dltext xxx">Are You Sure Want To Block ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger yess" data-dismiss="modal" onclick="formBlockSubmit()">Yes, Block</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
  
  
  
  
  
 

  
@stop