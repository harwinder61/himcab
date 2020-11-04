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
			
		   
              <div class="card">
		
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Driver Listing</h4>
				  
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Mobile
                        </th>
						<th>
                         City
                        </th>
						<th>
                          Offline/Online
                        </th>
						 <th>
                       Un-approved /Approved
					    </th>
						<th>
                          Document
                        </th>
						<th>
                          Action
                        </th>
					
                      </thead>
                        <tbody>
    
					<?php 
							$i = (Request::input('page')) ?  (Request::input('page') -1) * $driver->perPage() + 1 : 1; 
							?>
						@if(count($driver))
						@foreach($driver as $key => $value)
						<tr>
						<td>{{ $i }}</td>
						<td ><a href="{{url('/driverHistory')}}/{{$value->id}}" class="btn-btn-primary">@if ($value->name) {{$value->name}} @else N/A @endif</a></td>
						<td >@if ($value->email) {{$value->email}} @else N/A @endif</td>
						<td >@if ($value->phone) {{$value->phone}} @else N/A @endif</td>
						<td >@if ($value->city) {{$value->city}} @else N/A @endif</td>
						<td >@if ($value->OfflineAndOnline == 0) offline @else online @endif</td>
						<td>
						@if ($value->block_status == 4) 
						<a href="javascript:;" data-toggle="modal" onclick="driverForm({{$value->id}},{{$value->block_status}})" 
                        data-target="#BlockModals" class="btn abc delete">Approved</a>
						
						 @elseif ($value->block_status == 3)
						<a href="javascript:;" data-toggle="modal" onclick="driverForm({{$value->id}},{{$value->block_status}})" 
                        data-target="#BlockModals" class="btn abc delete">Un-Approved</a>
						 @endif
						
						
						</td>
                       <td>
					   <a href="{{url('/driverDocumentList')}}/{{$value->id}}" class="btn-btn-primary"><i class="fa fa-file"></i></a>
                       </td>					   
						
					   <td>
					   
						<a href="{{url('/driverDocument')}}/{{$value->id}}" class="btn-btn-primary"><i class="fa fa-upload" aria-hidden="true"></i></a>
			          </td>
					
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
			{{ $driver->links() }}
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
  
  <div id="BlockModals" class="modal fade text-danger delete-conformation-div" role="dialog">
   <div class="modal-dialog" >
     <!-- Modal content-->
     <form action="" id="blockForms" method="post" >
         <div class="modal-content">
             <div class="modal-header bg-danger">
                
                 <h4 class="modal-title text-center comfirm dApproved">Approved CONFIRMATION</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
				 				
                 {{ method_field('DELETE') }}
                 <p class="text-center dltext dxxx">Are You Sure Want To Approved ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger yess" data-dismiss="modal" onclick="driverApprovedSubmit()">Yes, Approved</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
  
  
  
  
  
 

  
@stop