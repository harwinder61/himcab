@extends('layouts.default')
@section('content')
<style type="text/css">
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
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
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #9c27b0;
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
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Create Vehicle</h4>
          </div>
          <div class="card-body">
             <form class="form-horizontal" method="post" action="{{url('/postVehicle')}}" id="profile_form" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vehicle Name</label>
                    <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cost</label>
                    <input type="text" class="form-control" id="cost" name="cost" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'');" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vehicle number</label>
                    <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vehicle type</label>
                    <select  class="form-control" name="category_id" >
                      <option>Select vehicle type</option>
                      @foreach($VehicleCategory as $value)
                        <option value="{{ $value->id}}">{{ $value->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <label class="switch">
                      <input type="checkbox" name="status">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Create Vehicle</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop