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
use App\Comment;
use DB;

class DriverController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;

    public function save_driver_details(Request $request)
    {
    	$user_id = $request->get('user_id');

    	if(empty($user_id))
    	{
    		$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

    	}else{

    		$user = User::find($user_id);

    		if(empty($user))
    		{
    			$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

    		}else{

    			$validator = Validator::make($request->all(), [ 
		            'driver_licence_no' 	=> 'required', 
		            'adhar_card' 			=> 'required', 
		            'vehicle_no' 			=> 'required',
		            'chassi_no' 			=> 'required' 
             
	        	]);

	        	if ($validator->fails()) 
		        { 
		        	$data = [];
		            return response()->json([
		                'status' => $this->failStatus,
		                'message' => $validator->errors(),
		                'data'   => $data
		            ], 400);
		        }

		        $driver = Driverdoc::create([
		        			'driver_id' => $user_id,
		        			'driver_licence_no' => $request->get('driver_licence_no'),
		        			'adhar_card_no' => $request->get('adhar_card'),
		        			'vehicle_no' => $request->get('vehicle_no'),
		        			'chassi_no' => $request->get('chassi_no')

		        ]);

		        $driverID = $driver->id;

		        $data = array(
		        		'id'       => $driverID,
		                'driver_id' => $user_id,
		        		'driver_licence_no' => $request->get('driver_licence_no'),
		        		'adhar_card_no' => $request->get('adhar_card'),
		        		'vehicle_no' => $request->get('vehicle_no'),
		        		'chassi_no' => $request->get('chassi_no')
		        );

		        return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "Driver register successfully",
		            'data'   => [$data]
		        ], 200);

    		}
    		
	    }
    }

    public function upload_document(Request $request)
    {
    	$driver_id = $request->get('driver_id'); 

    	if(empty($driver_id))
    	{
    		$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

    	}else{

    		$driver_detail = User::find($driver_id);  

    		if(empty($driver_detail))
    		{
    			$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

    		}else{

    			$details = Driverdoc::where('driver_id',$driver_id)->first();

    			if(empty($details))
    			{
    				if ($request->hasFile('driver_licence'))
			        {
			            $licence = $request->file('driver_licence'); 
			            $driver_licenceImage=$licence->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $licence->move($destinationPath, $driver_licenceImage);
			        }

			        if ($request->hasFile('adhar_card'))
			        {
			            $adhar_card = $request->file('adhar_card'); 
			            $adhar_cardImage=$adhar_card->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $adhar_card->move($destinationPath, $adhar_cardImage);
			        }

			        if ($request->hasFile('vehicle'))
			        {
			            $vehicle = $request->file('vehicle'); 
			            $vehicleImage=$vehicle->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $vehicle->move($destinationPath, $vehicleImage);
			        }

			        if ($request->hasFile('chassi'))
			        {
			            $chassi = $request->file('chassi'); 
			            $chassiImage=$chassi->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $chassi->move($destinationPath, $chassiImage);
			        }

			        if ($request->hasFile('police_verification'))
			        {
			            $police_verification = $request->file('police_verification'); 
			            $police_verificationImage=$police_verification->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $police_verification->move($destinationPath, $police_verificationImage);
			        }


	               	$document = Driverdoc::create([
	               				'driver_id' 			=> $driver_id,
	               				'driver_licence' 		=> $driver_licenceImage,
	               				'adhar_card' 			=> $adhar_cardImage,
	               				'vehicle'				=> $vehicleImage,
	               				'chassi' 				=> $chassiImage,
	               				'police_verification' 	=> $police_verificationImage,
	              	]);
	            }else{

	            	if ($request->hasFile('driver_licence'))
			        {
			            $licence = $request->file('driver_licence'); 
			            $driver_licenceImage=$licence->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $licence->move($destinationPath, $driver_licenceImage);
			        }

			        if ($request->hasFile('adhar_card'))
			        {
			            $adhar_card = $request->file('adhar_card'); 
			            $adhar_cardImage=$adhar_card->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $adhar_card->move($destinationPath, $adhar_cardImage);
			        }

			        if ($request->hasFile('vehicle'))
			        {
			            $vehicle = $request->file('vehicle'); 
			            $vehicleImage=$vehicle->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $vehicle->move($destinationPath, $vehicleImage);
			        }

			        if ($request->hasFile('chassi'))
			        {
			            $chassi = $request->file('chassi'); 
			            $chassiImage=$chassi->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $chassi->move($destinationPath, $chassiImage);
			        }

			        if ($request->hasFile('police_verification'))
			        {
			            $police_verification = $request->file('police_verification'); 
			            $police_verificationImage=$police_verification->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $police_verification->move($destinationPath, $police_verificationImage);
			        }

			        $details->driver_id 			= $driver_id;
				    $details->driver_licence 		= $driver_licenceImage;
				    $details->adhar_card 			= $adhar_cardImage;
				    $details->vehicle 				= $vehicleImage;
				    $details->chassi 				= $chassiImage;
				    $details->police_verification 	= $police_verificationImage;

				    $details->save();
				}
    			$data = array(
	               			'driver_id' => $driver_id
	            );

	            return response()->json([
				    'status' => $this->successStatus,
				    'message'=> "Driver Document upload successfully",
				    'data'   => [$data]
				], 200);

    		}
    	}
    }

/****************************
		EDIT PROFILE API
********************************/

	public function edit_profile(Request $request)
	{
		$user_id = $request->get('user_id');
		$destination_path = url()->previous(); 

		if(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

		}else{

			$userDetails = User::find($user_id);

			if(empty($userDetails))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

			}else{

				$name = $request->get('name');
				$phone = $request->get('phone');
				$user_type = $request->get('user_type');

				$userDetails->name = $name;
				$userDetails->phone = $phone;
				$userDetails->user_type = $user_type;

				$userDetails->save();

				if($user_type == 1)
				{
					$role = 'User';
				}elseif($user_type == 3)
				{
					$role = 'Driver';
				}

				$data = array(
						'user_id' 	=> $user_id,
						'name'    	=> $name,
						'phone'   	=> $phone,
						'usre_type' => $role,
						'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['driver_licence'], 
						'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['adhar_card'] , 
						'vehicle' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['vehicle'],
						'chassi' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['chassi'],
						'police_verification' 	=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['police_verification'],
						'driver_licence_no' 	=>  (isset($details->driver_doc['driver_licence_no'])) ? $userDetails->driver_doc['driver_licence_no'] : '' ,
						'adhar_card_no' 		=> (isset($userDetails->driver_doc['adhar_card_no'])) ? $userDetails->driver_doc['adhar_card_no'] : '' ,
						'vehicle_no' 		=> (isset($userDetails->driver_doc['vehicle_no'])) ? $userDetails->driver_doc['vehicle_no'] : '' ,
						'chassi_no' 		=> (isset($userDetails->driver_doc['chassi_no'])) ? $userDetails->driver_doc['chassi_no'] : '' ,

						'device_token' 		=> $userDetails->device_token,
						'device_type'  		=> $userDetails->device_type,
				);

				return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "Profile update Successfully",
		            'data'   => [$data]
		        ], 200);
			}

		}
	}

/****************************
	EDIT DOCUMENT NUMBER
********************************/

	public function edit_doc_nbr(Request $request)
	{
		$user_id = $request->get('user_id');
		$destination_path = url()->previous(); 

		if(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

		}else{

			$userDetails = User::find($user_id);

			if(empty($userDetails))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

			}else{
				$user_doc_nbr = Driverdoc::where('driver_id',$user_id)->first();

				if(empty($user_doc_nbr))
				{

					$document_nbr = Driverdoc::create([
									'driver_id' => $user_id,
									'driver_licence_no' => $request->get('driver_licence_no'),
									'adhar_card' => $request->get('adhar_card'),
									'vehicle_no' => $request->get('vehicle_no'),
									'chassi_no' => $request->get('chassi_no')
					]);

					if($userDetails->user_type == 1)
					{
						$role = 'User';
					}elseif($userDetails->user_type == 3)
					{
						$role = 'Driver';
					}

					$data = array(
						'user_id' 	=> $user_id,
						'name'    	=> $userDetails->name,
						'phone'   	=> $userDetails->phone,
						'usre_type' => $role,
						'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['driver_licence'], 
						'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['adhar_card'] , 
						'vehicle' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['vehicle'],
						'chassi' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['chassi'],
						'police_verification' 	=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['police_verification'],
						'driver_licence_no' 	=>  (isset($details->driver_doc['driver_licence_no'])) ? $userDetails->driver_doc['driver_licence_no'] : '' ,
						'adhar_card_no' 		=> (isset($userDetails->driver_doc['adhar_card_no'])) ? $userDetails->driver_doc['adhar_card_no'] : '' ,
						'vehicle_no' 		=> (isset($userDetails->driver_doc['vehicle_no'])) ? $userDetails->driver_doc['vehicle_no'] : '' ,
						'chassi_no' 		=> (isset($userDetails->driver_doc['chassi_no'])) ? $userDetails->driver_doc['chassi_no'] : '' ,

						'device_token' 		=> $userDetails->device_token,
						'device_type'  		=> $userDetails->device_type,
					);

					return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Documents number update successfully",
			            'data'   => [$data]
		        	], 200);

				}else{

					$user_doc_nbr->driver_licence_no = $request->get('driver_licence_no');
					$user_doc_nbr->adhar_card = $request->get('adhar_card');
					$user_doc_nbr->vehicle_no = $request->get('vehicle_no');
					$user_doc_nbr->chassi_no = $request->get('chassi_no');

					$user_doc_nbr->save();

					if($userDetails->user_type == 1)
					{
						$role = 'User';
					}elseif($userDetails->user_type == 3)
					{
						$role = 'Driver';
					}

					$data = array(
						'user_id' 	=> $user_id,
						'name'    	=> $userDetails->name,
						'phone'   	=> $userDetails->phone,
						'usre_type' => $role,
						'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['driver_licence'], 
						'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['adhar_card'] , 
						'vehicle' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['vehicle'],
						'chassi' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['chassi'],
						'police_verification' 	=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['police_verification'],
						'driver_licence_no' 	=>  (isset($details->driver_doc['driver_licence_no'])) ? $userDetails->driver_doc['driver_licence_no'] : '' ,
						'adhar_card_no' 		=> (isset($userDetails->driver_doc['adhar_card_no'])) ? $userDetails->driver_doc['adhar_card_no'] : '' ,
						'vehicle_no' 		=> (isset($userDetails->driver_doc['vehicle_no'])) ? $userDetails->driver_doc['vehicle_no'] : '' ,
						'chassi_no' 		=> (isset($userDetails->driver_doc['chassi_no'])) ? $userDetails->driver_doc['chassi_no'] : '' ,

						'device_token' 		=> $userDetails->device_token,
						'device_type'  		=> $userDetails->device_type,
					);

					return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Documents number update successfully",
			            'data'   => [$data]
		        	], 200);
				}

			}

		}
	}

/****************************************
	UPDATE DRIVER DOCUMENT
**************************************/
	public function updatedocument(Request $request)
	{
		$user_id = $request->get('user_id');
		$destination_path = url()->previous(); 

		if(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

		}else{

			$userDetails = User::find($user_id);  

			if(empty($userDetails))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

			}else{

				$user_doc_nbr = Driverdoc::where('driver_id',$user_id)->first();

				if(empty($user_doc_nbr))
				{
					if ($request->hasFile('driver_licence'))
			        {
			            $licence = $request->file('driver_licence'); 
			            $driver_licenceImage=$licence->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $licence->move($destinationPath, $driver_licenceImage);
			        }

			        if ($request->hasFile('adhar_card'))
			        {
			            $adhar_card = $request->file('adhar_card'); 
			            $adhar_cardImage=$adhar_card->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $adhar_card->move($destinationPath, $adhar_cardImage);
			        }

			        if ($request->hasFile('vehicle'))
			        {
			            $vehicle = $request->file('vehicle'); 
			            $vehicleImage=$vehicle->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $vehicle->move($destinationPath, $vehicleImage);
			        }

			        if ($request->hasFile('chassi'))
			        {
			            $chassi = $request->file('chassi'); 
			            $chassiImage=$chassi->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $chassi->move($destinationPath, $chassiImage);
			        }

			        if ($request->hasFile('police_verification'))
			        {
			            $police_verification = $request->file('police_verification'); 
			            $police_verificationImage=$police_verification->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $police_verification->move($destinationPath, $police_verificationImage);
			        }

			        $documents = Driverdoc::create([
			            					'driver_id' => $user_id,
			            					'driver_licence' => $driver_licenceImage,
			            					'adhar_card' => $adhar_cardImage,
			            					'vehicle' => $vehicleImage,
			            					'chassi' => $chassiImage,
			            					'police_verification' => $police_verificationImage

			        ]);

		            if($userDetails->user_type == 1)
			    	{
			    		$role = 'User';
			    	}elseif($userDetails->user_type == 3)
			    	{
			    		$role = 'Driver';
			    	}

			    	$data = array(
							'user_id' 	=> $user_id,
							'name'    	=> $userDetails->name,
							'phone'   	=> $userDetails->phone,
							'usre_type' => $role,
							'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['driver_licence'], 
							'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['adhar_card'] , 
							'vehicle' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['vehicle'],
							'chassi' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['chassi'],
							'police_verification' 	=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['police_verification'],
							'driver_licence_no' 	=>  (isset($userDetails->driver_doc['driver_licence_no'])) ? $userDetails->driver_doc['driver_licence_no'] : '' ,
							'adhar_card_no' 		=> (isset($userDetails->driver_doc['adhar_card_no'])) ? $userDetails->driver_doc['adhar_card_no'] : '' ,
							'vehicle_no' 		=> (isset($userDetails->driver_doc['vehicle_no'])) ? $userDetails->driver_doc['vehicle_no'] : '' ,
							'chassi_no' 		=> (isset($userDetails->driver_doc['chassi_no'])) ? $userDetails->driver_doc['chassi_no'] : '' ,

							'device_token' 		=> $userDetails->device_token,
							'device_type'  		=> $userDetails->device_type,
					);

				}else{

					if ($request->hasFile('driver_licence'))
			        {
			            $licence = $request->file('driver_licence'); 
			            $driver_licenceImage=$licence->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $licence->move($destinationPath, $driver_licenceImage);
			        }

			        if ($request->hasFile('adhar_card'))
			        {
			            $adhar_card = $request->file('adhar_card'); 
			            $adhar_cardImage=$adhar_card->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $adhar_card->move($destinationPath, $adhar_cardImage);
			        }

			        if ($request->hasFile('vehicle'))
			        {
			            $vehicle = $request->file('vehicle'); 
			            $vehicleImage=$vehicle->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $vehicle->move($destinationPath, $vehicleImage);
			        }

			        if ($request->hasFile('chassi'))
			        {
			            $chassi = $request->file('chassi'); 
			            $chassiImage=$chassi->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $chassi->move($destinationPath, $chassiImage);
			        }

			        if ($request->hasFile('police_verification'))
			        {
			            $police_verification = $request->file('police_verification'); 
			            $police_verificationImage=$police_verification->getClientOriginalName();
			            $destinationPath = public_path('/driverdoc');
			            $police_verification->move($destinationPath, $police_verificationImage);
			        }

			        $user_doc_nbr->driver_id = $user_id;
			    	$user_doc_nbr->driver_licence = $driver_licenceImage;
			    	$user_doc_nbr->adhar_card = $adhar_cardImage;
			    	$user_doc_nbr->vehicle = $vehicleImage;
			    	$user_doc_nbr->chassi = $chassiImage;
			    	$user_doc_nbr->police_verification = $police_verificationImage;

			    	$user_doc_nbr->save();

			    	if($userDetails->user_type == 1)
			    	{
			    		$role = 'User';
			    	}elseif($userDetails->user_type == 3)
			    	{
			    		$role = 'Driver';
			    	}

			    	$data = array(
							'user_id' 	=> $user_id,
							'name'    	=> $userDetails->name,
							'phone'   	=> $userDetails->phone,
							'usre_type' => $role,
							'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['driver_licence'], 
							'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['adhar_card'] , 
							'vehicle' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['vehicle'],
							'chassi' 				=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['chassi'],
							'police_verification' 	=> $destination_path.'/public/driverdoc/'.$userDetails->driver_doc['police_verification'],
							'driver_licence_no' 	=>  (isset($userDetails->driver_doc['driver_licence_no'])) ? $userDetails->driver_doc['driver_licence_no'] : '' ,
							'adhar_card_no' 		=> (isset($userDetails->driver_doc['adhar_card_no'])) ? $userDetails->driver_doc['adhar_card_no'] : '' ,
							'vehicle_no' 		=> (isset($userDetails->driver_doc['vehicle_no'])) ? $userDetails->driver_doc['vehicle_no'] : '' ,
							'chassi_no' 		=> (isset($userDetails->driver_doc['chassi_no'])) ? $userDetails->driver_doc['chassi_no'] : '' ,

							'device_token' 		=> $userDetails->device_token,
							'device_type'  		=> $userDetails->device_type,
					);
					
				}

				return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Documents number update successfully",
			            'data'   => [$data]
		        ], 200);
			}

		}
	}

/*************************************
	ONLINE OFFLINE DRIVER
************************************/
	public function onlineofflinedriver(Request $request)
	{
		$driver_id = $request->get('driver_id');
		$status = $request->get('status');
		$lat = $request->get('lat');
		$lng = $request->get('lng');

		if(empty($driver_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found",
	            'data'   => $data
	        ], 400);

		}else{
			$driverDetails = User::find($driver_id);

			if(empty($driverDetails))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found",
		            'data'   => $data
		        ], 400);

			}else{

				if($status == 1)  // CHANGE ONLINE
				{
					$driverDetails->id = $driver_id;
					$driverDetails->OfflineAndOnline = 2;
					$driverDetails->lat = $lng;
					$driverDetails->lng = $lng;

					$driverDetails->save();

					$data = array(
								'driver_id' => $driver_id
					);

					return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Driver online Successfully",
			            'data'   => [$data]
			        ], 200);


				}elseif($status == 2)   // CHANGE OFFLINE 
				{
					$driverDetails->id = $driver_id;
					$driverDetails->OfflineAndOnline = 1;
					$driverDetails->lat = $lng;
					$driverDetails->lng = $lng;

					$driverDetails->save();

					$data = array(
								'driver_id' => $driver_id
					);

					return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Driver offline Successfully",
			            'data'   => [$data]
			        ], 200);
				}
			}

		}
	}

/*****************************************
	COMMENT RATING POST API 
*********************************************/

	public function comment_ratingdriver(Request $request)
	{
		$driver_id = $request->get('driver_id');
		$user_id = $request->get('user_id');
		$comment = $request->get('comment');
		$rating = $request->get('rating');

		if(empty($driver_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "All fields are required",
	            'data'   => $data
	        ], 400);

		}elseif(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "All fields are required",
	            'data'   => $data
	        ], 400);

		}else{

			if(empty($comment))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "All fields are required",
		            'data'   => $data
		        ], 400);

			}elseif(empty($rating))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "All fields are required",
		            'data'   => $data
		        ], 400);

			}else{
				$commentdetails = Comment::create([
									'driver_id' => $driver_id,
									'user_id' => $user_id,
									'comment' => $comment,
									'rating' => $rating
				]);

				$data = array(
						'driver_id' => $driver_id,
						'user_id' => $user_id,
						'comment' => $comment,
						'rating' => $rating
				);

				return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "comment successfully",
		            'data'   => [$data]
		        ], 200);
			}

		}
	}

/******************************************
	GET DRIVER COMMENTS
********************************************/
	public function get_comments(Request $request)
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

			$commentDetails = Comment::where('driver_id',$driver_id)->get();

			foreach($commentDetails as $r)
			{
				$user_id = $r->user_id;

				

				$userDetails = User::find($user_id);

				$data[] = array(
						'user_id' 	=> $user_id,
						'driver_id' => $driver_id,
						'username' 	=> $userDetails->name,
						'email' 	=> $userDetails->email,
						'phone' 	=> $userDetails->phone,
						'comment' 	=> $userDetails->user_comment['comment'],
						'rating' 	=> $userDetails->user_comment['rating']
				);
			}

			return response()->json([
		            'status' => $this->successStatus,
		            'message'=> "All Comment founds",
		            'data'   => $data
		    ], 200);
			
		}
	}

/*****************************************
	DRIVER UPDATE PROFILE IMAGE 
**************************************/
	public function DriverEditProfileImage(Request $request)
	{
		$driver_id = $request->driver_id;
		$user_type = $request->user_type;
		$destination_path = url()->previous(); 

		if(empty($driver_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found ",
	            'data'   => $data
	        ], 400);

		}elseif(empty($user_type))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Driver not found ",
	            'data'   => $data
	        ], 400);

		}else{
			$driverProfile = User::find($driver_id);

			if(empty($driverProfile))
			{
				$data = [];

	        	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "Driver not found ",
		            'data'   => $data
		        ], 400);

			}else{

				if ($request->hasFile('user_img'))
		        {
		            $user_img = $request->file('user_img'); 
		            $user_imgImage=$user_img->getClientOriginalName();
		            $destinationPath = public_path('/user');
		            $user_img->move($destinationPath, $user_imgImage);
		        }

		        $driverProfile->user_img = $user_imgImage;

			    $driverProfile->save();

			    if($driverProfile->user_type == 1)
		    	{
		    		$role = 'User';
		    	}elseif($driverProfile->user_type == 3)
		    	{
		    		$role = 'Driver';
		    	}

			    $data = array(
							'user_id' 	=> $driver_id,
							'name'    	=> $driverProfile->name,
							'phone'   	=> $driverProfile->phone,
							'usre_type' => $role,
							'user_img' => $destination_path.'/public/user/'.$user_imgImage, 
							'driver_licence' 		=> $destination_path.'/public/driverdoc/'.$driverProfile->driver_doc['driver_licence'], 
							'adhar_card' 			=> $destination_path.'/public/driverdoc/'.$driverProfile->driver_doc['adhar_card'] , 
							'vehicle' 				=> $destination_path.'/public/driverdoc/'.$driverProfile->driver_doc['vehicle'],
							'chassi' 				=> $destination_path.'/public/driverdoc/'.$driverProfile->driver_doc['chassi'],
							'police_verification' 	=> $destination_path.'/public/driverdoc/'.$driverProfile->driver_doc['police_verification'],
							'driver_licence_no' 	=>  (isset($driverProfile->driver_doc['driver_licence_no'])) ? $driverProfile->driver_doc['driver_licence_no'] : '' ,
							'adhar_card_no' 		=> (isset($driverProfile->driver_doc['adhar_card_no'])) ? $driverProfile->driver_doc['adhar_card_no'] : '' ,
							'vehicle_no' 		=> (isset($driverProfile->driver_doc['vehicle_no'])) ? $driverProfile->driver_doc['vehicle_no'] : '' ,
							'chassi_no' 		=> (isset($driverProfile->driver_doc['chassi_no'])) ? $driverProfile->driver_doc['chassi_no'] : '' ,

							'device_token' 		=> $driverProfile->device_token,
							'device_type'  		=> $driverProfile->device_type,
					);

			   	return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "Driver profile image update successfully",
			            'data'   => [$data]
		        ], 200);


			}
		}
	}
}