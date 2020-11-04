@extends('layouts.default')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Create Vehicle Service</h4>
          </div>
          <div class="card-body">
             <form class="form-horizontal" method="post" action="{{url('/postService')}}" id="profile_form" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vehicle Service Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" required="" >
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Create Vehicle Service</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop