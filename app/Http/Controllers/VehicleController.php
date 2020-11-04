<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator,Redirect,Response;
use Hash;
use Session; 
use App\User;
use App\DriverHistory;
use App\Driverdoc;
use App\VehicleCategory;
use App\Vehicle;




class VehicleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vehicle()
    {  
    	$VehicleCategory = Vehicle::with('getVehicleCategory')->orderBy('id','desc')->paginate(10);
	   
	   return view('admin/vehicle/vehicle_list')->with(compact('VehicleCategory'));
    }
	
	public function createVehicle()
	{
		$VehicleCategory = VehicleCategory::get();

		return view('admin/vehicle/create')->with(compact('VehicleCategory'));	
	}
	
	public function postVehicle(Request $request)
	{
		$input = $request->all();

		$validator = Validator::make($request->all(), [ 
           'vehicle_name' 	=> 'required',
           'cost' 			=> 'required',
		   'vehicle_number' => 'required',
		   'category_id' 	=> 'required',
		   'image' 			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
		
		
		if ($validator->fails()) {
			return redirect()->back()->withInput($input)->withErrors($validator->errors());
		}
		
		if($request->status == 'on')
		{
			$status = 1;
			
		}else{
			$status = 0;
			
		}

		if ($request->hasFile('image'))
		{
			$image 				= $request->file('image');
			$imagename 			= time().'.'.$image->getClientOriginalExtension();
			$destinationPath 	= public_path('/driverdoc');
			$image->move($destinationPath, $imagename);
		}

		$data = [
        	'vehicle_name' 		=> $request->vehicle_name,		
	    	'cost' 				=> $request->cost,
			'vehicle_number' 	=> $request->vehicle_number,
			'category_id' 		=> $request->category_id, 
			'image' 			=> $imagename,
			'status' 			=> $status
	
		];
		DB::table('vehicle')->insert($data);
		Session::flash('flash_message', 'Vehicle added successfully');
		Session::flash('alert-class', 'alert-success');

		return redirect('vehicle');
	}
	
	public function VehicleDelete($id){
	
	 DB::table('vehicle')->where('id',$id)->delete();
	 Session::flash('flash_message', 'Vehicle deleted successfully');
	 Session::flash('alert-class', 'alert-success');
	 return redirect('vehicle');
	}
	
	public function editVehicle($id)
	{
	
	 $vehicle = DB::table('vehicle')->where('id',$id)->first();
	
	 $VehicleCategory = VehicleCategory::get();

	 return view('admin/vehicle/edit')->with(compact('vehicle','VehicleCategory'));
	}
	
	public function updateVehicle(Request $request)
	{
		if($request->status == 'on')
		{
			$status = 1;

		}else{
			$status = 0;
		}

		if(empty($request->hasFile('image')))
		{
			$data = [
				'vehicle_name' 		=> $request->vehicle_name,
				'cost' 				=> $request->cost,
				'vehicle_number' 	=> $request->vehicle_number,
				'category_id' 		=> $request->category_id, 
				'status' 			=> $status
	
			];

			DB::table('vehicle')->where('id',$request->vehicle_id)->update($data);
	   
        }else{

        	$image = time().'.'.$request->image->extension();  
        	$request->image->move(public_path('driverdoc'), $image);

        	$data = [
        		'vehicle_name' 		=> $request->vehicle_name,
        		'cost' 				=> $request->cost,
        		'vehicle_number' 	=> $request->vehicle_number,
        		'category_id' 		=> $request->category_id,
        		'image' 			=> $image,
        		'status' 			=> $status
        	];
        	DB::table('vehicle')->where('id',$request->vehicle_id)->update($data);
        } 

        Session::flash('flash_message', 'vehicle detail updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('vehicle');
	}

	public function service(Request $request)
	{
		$VehicleService = VehicleCategory::orderBy('id','desc')->paginate(10);

		return view('admin/vehicle/service')->with(compact('VehicleService'));	
	}	

	public function createService(Request $request)
	{
		return view('admin.vehicle.servicecreate');
	}

	public function postService(Request $request)
	{
		$category_name = $request->category_name;

		$data = VehicleCategory::create([
						'category_name' => $category_name
		]);

		Session::flash('flash_message', 'Service added successfully');
		Session::flash('alert-class', 'alert-success');

		return redirect('service');
	}

	public function editService($id)
	{
		$VehicleCategory = VehicleCategory::find($id);
		return view('admin/vehicle/serviceedit')->with(compact('VehicleCategory'));
	}

	public function updateService(Request $request)
	{
		$category_id 	= $request->category_id;
		$category_name 	= $request->category_name;

		$VehicleCategory = VehicleCategory::find($category_id);

		$data = [
        		'category_name' 		=> $category_name
        		
        ];

        DB::table('vehicle_category')->where('id',$category_id)->update($data);

        Session::flash('flash_message', 'Service update successfully');
		Session::flash('alert-class', 'alert-success');

		return redirect('service');
	}

	public function VehicleServiceDelete($id)
	{
		DB::table('vehicle_category')->where('id',$id)->delete();
		Session::flash('flash_message', 'Service deleted successfully');
		Session::flash('alert-class', 'alert-success');
		return redirect('service');
	}
}
