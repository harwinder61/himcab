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

class UserController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;


/******************************************
	GET DRIVER COMMENTS
********************************************/
	public function get_comments(Request $request)
	{
		$user_id = $request->get('user_id');

		if(empty($user_id))
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "User not found ",
	            'data'   => $data
	        ], 400);

		}else{

			$commentDetails = Comment::where('user_id',$user_id)->get();

			if(count($commentDetails) == 0)
			{
				$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Comment not found",
	            'data'   => $data
	        ], 400);

			}else{

				foreach($commentDetails as $r)
				{
					$driver_id = $r->driver_id;

					

					$userDetails = User::find($driver_id);

					$data[] = array(
							'user_id' 	=> $user_id,
							'driver_id' => $driver_id,
							'username' 	=> $userDetails->name,
							'email' 	=> $userDetails->email,
							'phone' 	=> $userDetails->phone,
							'comment' 	=> $userDetails->driver_comment['comment'],
							'rating' 	=> $userDetails->driver_comment['rating']
					);
				}

				return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "All Comment founds",
			            'data'   => $data
			    ], 200);

			}

			
			
		}
	}

/*****************************************
	USER UPDATE PROFILE IMAGE 
**************************************/
	public function UserEditProfileImage(Request $request)
	{
		$user_id = $request->user_id;
		$user_type = $request->user_type;
		$destination_path = url()->previous(); 

		if(empty($user_id))
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
			$userProfile = User::find($user_id);

			if(empty($userProfile))
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

		        $userProfile->user_img = $user_imgImage;

			    $userProfile->save();

			    if($userProfile->user_type == 1)
		    	{
		    		$role = 'User';
		    	}elseif($userProfile->user_type == 3)
		    	{
		    		$role = 'Driver';
		    	}

			    $data = array(
							'user_id' 	=> $user_id,
							'name'    	=> $userProfile->name,
							'phone'   	=> $userProfile->phone,
							'usre_type' => $role,
							'user_img' => $destination_path.'/public/user/'.$user_imgImage, 
							'device_token' 		=> $userProfile->device_token,
							'device_type'  		=> $userProfile->device_type,
					);

			   	return response()->json([
			            'status' => $this->successStatus,
			            'message'=> "User profile image update successfully",
			            'data'   => [$data]
		        ], 200);


			}
		}
	}
}