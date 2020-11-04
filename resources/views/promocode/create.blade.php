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
          <h4>Create PromoCode</h4>
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
	         <form class="form-horizontal" method="POST" action="{{url('/postPromocode')}}" id="profile_form"c enctype="multipart/form-data">
            @csrf
	              <div class="form-group ">
                  <label for="promocode_name" class="col-sm-3 col-form-label bmd-label-floating">Promo Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="promocode_name"  class="form-control" id="promocode_name" placeholder="" value="{{old('promocode_name')}}">
                  </div>
                </div>
                <div class="form-group row ">
                      <label for="promocode_type" class="col-sm-3  col-form-label bmd-label-floating">Promo Type</label>
                    <div class="col-sm-9">
                      <select  class="form-control" name="promocode_type" value="{{old('promocode_type')}}">
                          <option value="">Select Type </option>
                          <option value="Percentage">Percentage </option>
                          <option value="Amount">Amount</option>
                      </select>
                    </div>
                 </div>
                <div class="form-group ">
                    <label for="offer_value" class="col-form-label bmd-label-floating">Offer value</label>
                    <div class="col-sm-10">
                      <input type="text" name="offer_value"  class="form-control" id="offer_value" placeholder="" value="{{old('expire_date')}}">
                    </div>
                 </div>
                 <div class="form-group row ">
                   <label for="usage_limit" class="col-sm-3  col-form-label bmd-label-floating">Usage Limit</label>
                  <div class="col-sm-9">
                   <select  class="form-control" name="usage_limit" value="{{old('usage_limit')}}">
                    <option value="">Select Limit </option>
                    <option value="one_time">One Time </option>
                    <option value="two_time">Two Time</option>
                    <option value="three_time">Three Time</option>
                   </select>
                 </div>
                 </div>
                <div class="form-group ">
                    <label for="expire_date" class="col-form-label bmd-label-floating">Expire Date</label>
                    <div class="col-sm-10">
                      <input type="date" name="expire_date"  class="form-control" id="expire_date" placeholder="" value="{{old('expire_date')}}">
                    </div>
                 </div>
                <div class="form-group row ">
                    <label for="status" class="col-sm-3  col-form-label bmd-label-floating">Status</label>
                    <div class="col-sm-9">
                      <select  class="form-control" name="status" value="{{old('status')}}">
                          <option value="">Select Status </option>
                          <option value="Active">Active </option>
                          <option value="Deactive">Deactive</option>
                      </select>
                    </div>
                 </div>
	              <div class="form-group row">
	                <div class="offset-sm-2 col-sm-10">
	                  <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
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
