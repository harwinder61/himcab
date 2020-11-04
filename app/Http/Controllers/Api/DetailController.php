<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Response;
use Hash;

use Socialite;
use TextLocal;

use App\User;
use App\DriverHistory;
use App\Driverdoc;
use App\DriverPersonalDetail;
use DB;

class DetailController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;

    public function get_details(Request $request)
    {
    	$user_id = $request->get('user_id');
    	
        $destination_path = url()->previous();    

    	if(empty($user_id))
    	{
    		$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "User not found",
	            'data'   => $data
	        ], 400);

    	}else{
    		$details = User::find($user_id);

    		if($details->user_type == 3)
    		{
    			$data = array(
    						'driver_id' => $details->id,
    						'name' => (isset($details->name)) ? $details->name : '' , 
    						'email' => (isset($details->email)) ? $details->email : '' , 
    						'phone' => (isset($details->phone)) ? $details->phone : '' , 
    						'driver_licence' => $destination_path.'/public/driverdoc/'.$details->driver_doc['driver_licence'], 
    						'adhar_card' => $destination_path.'/public/driverdoc/'.$details->driver_doc['adhar_card'] , 
    						'vehicle' => $destination_path.'/public/driverdoc/'.$details->driver_doc['vehicle'],
    						'chassi' => $destination_path.'/public/driverdoc/'.$details->driver_doc['chassi'],
    						'police_verification' => $destination_path.'/public/driverdoc/'.$details->driver_doc['police_verification'],
    						'driver_licence_no' =>  (isset($details->driver_doc['driver_licence_no'])) ? $details->driver_doc['driver_licence_no'] : '' ,
    						'adhar_card_no' => (isset($details->driver_doc['adhar_card_no'])) ? $details->driver_doc['adhar_card_no'] : '' ,
    						'vehicle_no' => (isset($details->driver_doc['vehicle_no'])) ? $details->driver_doc['vehicle_no'] : '' ,
    						'chassi_no' => (isset($details->driver_doc['chassi_no'])) ? $details->driver_doc['chassi_no'] : '' ,
    						'device_type' =>(isset($details->device_type)) ? $details->device_type : '' ,  
    						'device_token' => (isset($details->device_token)) ? $details->device_token : '' ,  

    			);

    			return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "Driver found Successfully",
		            'data'   => [$data]
		        ], 200);

    		}else if($details->user_type == 1)
    		{
    			$data = array(
    						'user_id' => $details->id,
    						'name' => (isset($details->name)) ? $details->name : '' , 
    						'email' => (isset($details->email)) ? $details->email : '' , 
    						'phone' => (isset($details->phone)) ? $details->phone : '' ,  
    						'device_token' => (isset($details->device_token)) ? $details->device_token : '' ,  
    						'device_type' => (isset($details->device_type)) ? $details->device_type : '' ,  
    			);

    			return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "User found Successfully",
		            'data'   => [$data]
		        ], 200);
    		}
        }
    }  

}