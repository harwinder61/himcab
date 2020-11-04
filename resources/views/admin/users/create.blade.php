@extends('layouts.default')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Create Rider</h4>
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
             <form class="form-horizontal" method="post" action="{{url('/postUser')}}" id="profile_form" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                  </div>
                </div>
              </div>
             
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                  </div>
                </div>
              </div>

               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    
                    <input type="text" class="form-control" id="phone" name="phone" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'');" maxlength="11">
                  </div>
                </div>
              </div>

              <!-- <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="email" class="form-control" id="password" name="password" >
                  </div>
                </div>
              </div> -->
             
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="user_img" accept="image/x-png,image/gif,image/jpeg" />
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Create Rider</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop