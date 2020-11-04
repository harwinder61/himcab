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
.card form {
    display: inline-block;
}
td a.btn-btn-primary {
    display: inline-block;
    margin: 0px 0px 0 15px;
}
.vehi h4 {
    text-align: right !important;
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
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title ">Vehicle Service</h4>
                    </div>
                    <div class="col-md-6 vehi">
                      <a href="{{url('/createService')}}" class="add_vehicle_cl">
                         <h4 class="card-title "><i class="fa fa-plus">Add Vehicle Service</i></h4>
                       </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php 
                    $i = (Request::input('page')) ?  (Request::input('page') -1) * $VehicleService->perPage() + 1 : 1; 
                    ?>
                    @if(count($VehicleService))
                    @foreach($VehicleService as $key => $value)
                    <tr>
                      <td>{{ $i }}</td>
                      <td >@if ($value->category_name) {{$value->category_name}} @else N/A @endif</td>
                   
                      <td>
                        <form method="POST" action="" id="delete_{{ $value->id }}" accept-charset="UTF-8">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="javascript:;" data-toggle="modal" onclick="deletevehicleServiceData({{$value->id}})" data-target="#DeleteModal" class="abc delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </form>
                        <a href="{{url('/editService')}}/{{$value->id}}" class="btn-btn-primary">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
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
                {{ $VehicleService->links() }}
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-------------------------------------------------
    DELETE CONFIRMATION MODAL
------------------------------------------------------>
<div class="modal fade" id="user-modal"></div>
<div id="DeleteModal" class="modal fade text-danger delete-conformation-div" role="dialog">
  <div class="modal-dialog" >
    <!-- Modal content-->
    <form action="" id="vehicleServiceDelete" method="post" >
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
            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formVehicleServiceSubmit()">Yes, Delete</button>
          </center>
        </div>
      </div>
    </form>
  </div>
</div>
@stop