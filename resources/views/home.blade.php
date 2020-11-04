@extends('layouts.default')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Total User</p>
				  @php $users = \DB::table('users')->count(); @endphp
                  <h3 class="card-title">{{$users}}
                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger"></i>
                    <a href="javascript:;"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
				    @php $driver = \DB::table('users')->where('user_type',2)->count(); @endphp
                  <p class="card-category">Total Driver</p>
                  <h3 class="card-title">{{$driver}}
				   </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
				    @php $rider = \DB::table('users')->where('user_type',1)->count(); @endphp
                  <p class="card-category">Total Rider</p>
                  <h3 class="card-title">{{$rider}}
				  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">directions_car</i>
                  </div>
				 @php  $VehicleCategory = \DB::table('vehicle')->count(); @endphp
                  <p class="card-category">Total vehicle</p>
                  <h3 class="card-title">{{$VehicleCategory}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  
                  </div>
                </div>
              </div>
            </div>
         
                     
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
@endsection
