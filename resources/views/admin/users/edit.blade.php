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
            <h4 class="card-title">Edit Rider</h4>
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form class="form-horizontal" method="post" action="{{url('/updateUser')}}" id="profile_form" enctype="multipart/form-data">
              @csrf
              <input type="hidden"  name="id" value="{{$user->id}}">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'');" value="{{$user->phone}}" maxlength="11">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <label class="switch">
                      <input type="checkbox" name="block_status" {{ $user->block_status == '1' ? 'checked="checked"' : '' }}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="user_img" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Update Rider</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">  
          <div class="card-avatar">
            <a href="javascript:;">
              @if(empty($user->user_img))
                <img class="img" src="{{url('/public/user/default-user.png')}}" />
              @else
                <img class="img" src="{{url('/public/user/')}}/{{$user->user_img}}" />
              @endif
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">{{ucfirst($user->name)}}</h6>
            
            <p>Email : {{$user->email}}</p>
            <p>Phone : {{$user->phone}}</p>
           
            @if($user->block_status == 1)
              <p>Status : Unblock</p>
            @else
              <p>Status : Block</p>
            @endif
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
@stop