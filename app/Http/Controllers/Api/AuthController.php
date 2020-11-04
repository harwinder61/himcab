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
use DB;

class AuthController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;

/*************************************************
		REGISTER API USER/DRIVER
*****************************************************/

    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(), [ 
            'name' 		=> 'required', 
            'email' 	=> 'required|email|unique:users,email', 
            'mobile' 	=> 'required',
            'password' 	=> 'required' 
             
        ]);

        $user_exist = User::where('email',$request->email)->first();

        if(!empty($user_exist))
        {
             return response()->json([
            'status' => $this->successStatus,
            'message'=> "User already exist",
            'data'   => []
            ], 200);
        }else{

            $role = $request->get('type');

            if($role == 'user')
            {
                $type = '1';    // user
            }else{
                $type = '3';     // driver 
            }

            $user = User::create([
                'name'          => $request->get('name'),
                'email'         => $request->get('email'),
                'password'      => Hash::make($request->get('password')),
                'user_type'     => $type,
                'device_type'   => $request->get('device_type'),
                'device_token'  => $request->get('device_token'),
                'phone'        => $request->get('mobile'),
                'block_status'  => '1',

            ]);

            $userID = $user->id;

            $data = array(
                    'user_id'       => $userID,
                    'name'          => $request->get('name'),
                    'email'         => $request->get('email'),
                    'mobile'        => $request->get('mobile'),
                    'type'          => $request->get('type'),
                    'block_status'  => 'Unblock'
            );

            return response()->json([
                'status' => $this->successStatus,
                'message'=> "Sign up successfully",
                'data'   => [$data]
            ], 200);
        }
    }

/***************************************
		LOGIN API
********************************************/
	
	public function login(Request $request)
	{
        $user_type = $request->get('user_type');
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
		{ 
            $user = Auth::user();     //echo "<pre/>"; print_r($user); die('data');

            if(empty($user))
            {
            	$data = [];

            	return response()->json([
		            'status' => $this->failStatus,
		            'message'=> "User not found",
		            'data'   => [$data]
		        ], 400);

            }else{

                if($user_type == 1)
                {
                    if($user_type == $user->user_type)
                    {
                        if($user->user_type == '1')
                        {
                            $type = 'user';    // user
                        }else{
                            $type = 'driver';     // driver 
                        }

                        if($user->block_status == '1')
                        {
                            $blockStatus = 'Unblock';
                        }else if($user->block_status == '2')
                        {
                            $blockStatus = 'Block';
                        }

                        $data = array(

                            'user_id' => (isset($user->id)) ? $user->id : '' ,
                            'name'    => (isset($user->name)) ? $user->name : '' ,
                            'email'   => (isset($user->email)) ? $user->email : '' ,
                            'mobile'   => (isset($user->phone)) ? $user->phone : '' ,
                            'type'    => $type,
                            'status' => $blockStatus
                                    
                        );

                        return response()->json([
                            'status' => $this->successStatus,
                            'message'=> "User login Success",
                            'data'   => [$data]
                        ], 200);

                    }else{

                        $data = [];

                        return response()->json([
                            'status' => $this->failStatus,
                            'message'=> "Login fail",
                            'data'   => $data
                        ], 400);
                    }

                }elseif($user_type == 3)
                {
                    if($user_type == $user->user_type)
                    {
                        if($user->user_type == '1')
                        {
                            $type = 'user';    // user
                        }else{
                            $type = 'driver';     // driver 
                        }

                        if($user->block_status == '1')
                        {
                            $blockStatus = 'Unblock';
                        }else if($user->block_status == '2')
                        {
                            $blockStatus = 'Block';
                        }

                        $data = array(

                            'driver_id' => (isset($user->id)) ? $user->id : '' ,
                            'name'    => (isset($user->name)) ? $user->name : '' ,
                            'email'   => (isset($user->email)) ? $user->email : '' ,
                            'mobile'   => (isset($user->phone)) ? $user->phone : '' ,
                            'type'    => $type,
                            'status' => $blockStatus
                                    
                        );

                        return response()->json([
                            'status' => $this->successStatus,
                            'message'=> "Driver login Success",
                            'data'   => [$data]
                        ], 200);
                    }else{
                        $data = [];

                        return response()->json([
                            'status' => $this->failStatus,
                            'message'=> "Login fail",
                            'data'   => $data
                        ], 400);
                    }

                }
            }
        } 
        else{ 

           $data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Please enter all fields",
	            'data'   => $data
	        ], 400);
        } 
	}

/*************************************
	FORGOT PASSWORD API 
**************************************/
	
	public function forgot_pswd(Request $request)
	{
		$input = $request->all();
		
       	if(empty($request->email))
       	{
       		$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Email field is required",
	            'data'   => $data
	        ], 400);
 
       	}
        
		$user = User::where('email', '=', $request->email)->first();

		if ($user === null) 
		{
			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Please enter a valid email address.",
	            'data'   => $data
	        ], 400);

		}

		$check_username = User::where('email', $request->email)->first();

		if(!empty($check_username))
		{
			$password = uniqid();
		    $msg = "Your Password:".$password;
		    $msg = wordwrap($msg,70);  

            mail($request->email,"Forget Password",$msg);		
			
			$check_username->password = bcrypt($password);
			$check_username->save();

		    $data = [];

        	return response()->json([
	            'status' => $this->successStatus,
	            'message'=> "please your check email.",
	            'data'   => $data
	        ], 200);

		}else{

			$data = [];

        	return response()->json([
	            'status' => $this->failStatus,
	            'message'=> "Failure.",
	            'data'   => $data
	        ], 400);
        }
	}

/****************************************
		SOCIAL LOGIN API 
*********************************************/

	public function social_login(Request $request)
	{
		$social_details = $request->all();  

		$user_name  = $social_details['name'];
        $email      = $social_details['email'];
        $user_type       = $social_details['user_type'];
        $loginwith     = $social_details['loginwith'];
        $device_token = $social_details['device_token'];
        $device_type  = $social_details['device_type'];


        $user_detail = User::where('email',$email)->first();

        if(!($user_detail))
        {
            $user = User::create([
        					'name' 			=> $user_name,
        					'email' 		=> $email,
        					'user_type' 	=> $user_type,
        					'loginwith' 	=> $loginwith,
        					'device_type' 	=> $device_type,
        					'device_token' 	=> $device_token
        	]);

            if($user_type == 1)
            {
                if($user_type == 1)
                {
                    $role  = 'User';
                }elseif($user_type == 3)
                {
                    $role = 'Driver';
                }

                $data = array(
                        'user_id' => $user->id,
                        'name'  => $user_name,
                        'email' => $email,
                        'user_type' => $role
                        

                );
            }elseif($user_type == 3)
            {
                if($user_type == 1)
                {
                    $role  = 'User';
                }elseif($user_type == 3)
                {
                    $role = 'Driver';
                }

                $data = array(
                        'driver_id' => $user->id,
                        'name'  => $user_name,
                        'email' => $email,
                        'user_type' => $role
                        

                );
            }
            return response()->json([
                'status' => $this->successStatus,
                'message' => "Login Success",
                'data'  => [$data]
            ], 200);

        }else{

        	 DB::table('users')
                ->where('email',$email)
                ->update(['name' => $user_name, 'email' => $email,'user_type'=>$user_type,'device_token' => $device_token , 'device_type' => $device_type,'loginwith'=>$loginwith]);

            if($user_detail->user_type== 1)
            {
                if($user_detail->user_type== 1)
                {
                    $role = 'User';
                }elseif($user_detail->user_type == 3)
                {
                    $role = 'Driver';
                }

                $data = array(
                        'user_id'       => (isset($user_detail->id)) ? $user_detail->id : '', 
                        'name'          => (isset($user_detail->name)) ? $user_detail->name : '', 
                        'email'         => (isset($user_detail->email)) ? $user_detail->email : '', 
                        'phone'         => (isset($user_detail->phone)) ? $user_detail->phone : '',
                        'user_type'     => $role,
                        'device_token'  => (isset($user_detail->device_token)) ? $user_detail->device_token : '', 
                        'device_type'   => (isset($user_detail->device_type)) ? $user_detail->device_type : '', 
                          

                );
            }elseif($user_detail->user_type == 3)
            {
                if($user_detail->user_type== 1)
                {
                    $role = 'User';
                }elseif($user_detail->user_type == 3)
                {
                    $role = 'Driver';
                }

                $data = array(
                        'driver_id'       => (isset($user_detail->id)) ? $user_detail->id : '', 
                        'name'          => (isset($user_detail->name)) ? $user_detail->name : '', 
                        'email'         => (isset($user_detail->email)) ? $user_detail->email : '', 
                        'phone'         => (isset($user_detail->phone)) ? $user_detail->phone : '',
                        'user_type'     => $role,
                        'device_token'  => (isset($user_detail->device_token)) ? $user_detail->device_token : '', 
                        'device_type'   => (isset($user_detail->device_type)) ? $user_detail->device_type : '', 
                          

                );
            }

            

            return response()->json([
                'status' => $this->successStatus,
                'message' => "Login Success",
                'data'  => [$data]
            ], 200);

        }
	}
}