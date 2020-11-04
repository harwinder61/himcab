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
use App\Booking;
use App\Driverdoc;
use App\DriverPersonalDetail;
use App\Comment;
use DB;

class BookingController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;


/******************************************
	USER RIDE BOOKED API
********************************************/
	public function ridebook(Request $request)
	{
		$user_id 		= $request->get('user_id');
		$source 		= $request->get('source');
		$destination 	= $request->get('destination');
		$lat 			= $request->get('lat');
		$lng			= $request->get('lng');


		if(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "User not found",
	            'data'   => $data
	        ], 400);

		}else{
			$userDetail = User::find($user_id);

			if($userDetail->user_type != 1)     // rider 1 status
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "User not found",
		            'data'   => $data
		        ], 400);

			}else{
				if(empty($source))
				{	
					$data = [];

		        	return response()->json([
			            'status' => $this->failStatus,
			            'message'=> "All field are required",
			            'data'   => $data
			        ], 400);

				}elseif(empty($destination))
				{
					$data = [];

		        	return response()->json([
			            'status' => $this->failStatus,
			            'message'=> "All field are required",
			            'data'   => $data
			        ], 400);
				}else{
					$booking  = Booking::create([
								'user_id' 		=> $user_id,
								'source' 		=> $source,
								'destination' 	=> $destination,
								'lat'           => $lat,
								'lng' 			=> $lng,
								'status'        => 1

					]);

					if($userDetail->userridebooking['status'] == 1)
					{
						$status = 'Request';
					}

					$request = array(
							'user_id' 		=> $user_id,
							'name' 			=> $userDetail->name,
							'email' 		=> $userDetail->email,
							'phone' 		=> $userDetail->phone,
							'source' 		=> $source,
							'destination' 	=> $destination,
							'status'        => $status

					);

					// $booked= array(
					// 		'user_id' 		=> $user_id,
					// 		'name' 			=> $userDetail->name,
					// 		'email' 		=> $userDetail->email,
					// 		'phone' 		=> $userDetail->phone,
					// 		'source' 		=> $source,
					// 		'destination' 	=> $destination,
					// );

					return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Ride Booked Successfull.",
			            'request'   => [$request]
			            // 'booked' => [$booked]
			    	], 200);
				}
				
			}
		}
	}

/************************************************
	DRIVER FIND NERABY USER SOURCE DESTINATION
************************************************/

	public function nearbydriver(Request $request)
	{
		$driver_id = $request->get('driver_id');

		if(empty($driver_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found ",
	            'data'   => $data
	        ], 400);

		}else{

			$booking_details = Booking::where('status','=','1')->get();

			foreach($booking_details as $r)
			{
				$book_lat = $r->lat;
				$book_lng = $r->lng;

				$getbooking_details = DB::table("users")
			    ->select("users.*"
			        ,DB::raw("6371 * acos(cos(radians(" . $book_lat . ")) 
			        * cos(radians(lat)) 
			        * cos(radians(lng) - radians(" . $book_lng . ")) 
			        + sin(radians(" .$book_lat. ")) 
			        * sin(radians(lat))) AS distance"))
			        ->where('OfflineAndOnline','=',2)
			        ->where('user_type','=',3)
			        //->groupBy("users.id")
			        ->get();

			    echo "<pre/>"; print_r($getbooking_details); 
			}

			die('data');

			$driver_details = User::where('OfflineAndOnline','=','2')->get();

			echo "<pre/>"; print_r($driver_details); die('data');


		}
	}
	
}