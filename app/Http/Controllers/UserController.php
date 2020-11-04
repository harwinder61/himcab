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


class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    { 
     	$title = "User";
	   $users = User::where('user_type',1)->orderBy('id','desc')->paginate();
	   
	   return view('admin/users/users_list')->with(compact('users','title'));
    }
	
	public function createUser(){
	
	 return view('admin/users/create');	
	}
	
	public function postUser(Request $request)
	{

		$input = $request->all(); 
		
		$validator = Validator::make($request->all(), [ 
           	'name' 	=> 'required',
           	'email' => ' required|unique:users,email',
		   	'phone' => 'required|'
		]);
		
		
		if ($validator->fails()) 
		{
			return redirect()->back()->withInput($input)->withErrors($validator->errors());
		}

		if ($request->hasFile('user_img'))
        {

        	$user_img1 			= $request->file('user_img'); 
            $user_imgImage 		= $user_img1->getClientOriginalName();
            $destinationPath 	= public_path('/user');
            $user_img1->move($destinationPath, $user_imgImage);
        }else{
        	$user_imgImage = '';
        }

        $data = User::create([
        			'name' 		=> $request->name,
        			'email' 	=> $request->email,
        			'phone' 	=> $request->phone,
        			'user_type' => 1,
        			'user_img'  => $user_imgImage,
        			'block_status' => 1
        ]);

        Session::flash('flash_message', 'Rider added successfully');
		Session::flash('alert-class', 'alert-success');

		return redirect('users');
	}
	
	public function userDelete($id){
	
	 DB::table('users')->where('id',$id)->delete();
	 Session::flash('flash_message', 'Rider deleted successfully');
	 Session::flash('alert-class', 'alert-success');
	 return redirect('users');
	}
	
	public function editUser($id)
	{
	 $user = DB::table('users')->where('id',$id)->first();
	 
	 return view('admin/users/edit')->with(compact('user'));
	}
	
	public function updateUser(Request $request)
	{
	 	$validator = Validator::make($request->all(), [ 
           'name' => 'required',
           'phone' => 'required'
		   
        ]);
		
		if ($validator->fails()) {
			return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
		}

		$userProfile = User::find($request->id);


		if ($request->hasFile('user_img'))
        {
            $user_img = $request->file('user_img'); 
            $user_imgImage=$user_img->getClientOriginalName();
            $destinationPath = public_path('/user');
            $user_img->move($destinationPath, $user_imgImage);

        }else{
        	$user_imgImage = $userProfile->user_img;
        }

        if($request->block_status == 'on')
        {
        	$block_status = '1';

        }else{

        	$block_status = '2';
        }

        $userProfile->name 			= $request->name;
        $userProfile->email 		= $request->email;
        $userProfile->phone 		= $request->phone;
        $userProfile->user_type 	= 1;
        $userProfile->user_img 		= $user_imgImage;
        $userProfile->block_status 	= $block_status;

	    $userProfile->save();

		
		Session::flash('flash_message', 'Rider updated successfully');
		Session::flash('alert-class', 'alert-success');
		return redirect('users');
	}
	
	public function userBlock($id,$block_status){
		if($block_status == 1){
			
			$b_status = 2;
			
		}else{
			$b_status = 1;
			
		}
		
	$data = [
        'block_status' => $b_status
	];

		
	 $user = DB::table('users')->where('id',$id)->update($data);
	 
	 if($block_status == 1){
			
	 Session::flash('flash_message', 'User Blocked successfully');
	 Session::flash('alert-class', 'alert-success');
			
	}else{
		Session::flash('flash_message', 'User Unlocked successfully');
	 Session::flash('alert-class', 'alert-success');
	}
	 
	 return redirect('users');	
		
		
	}
	
	
	public function driver(){
		
		$driver = User::where('user_type',2)->paginate();
		
		
		return view('driver/driver_list')->with(compact('driver'));
		
	}
	public function driverHistory($id){
	
		
		$driverHistory = DriverHistory::where('driver_id', $id)->paginate(); 
		
		return view('driver/history')->with(compact('driverHistory','id'));
		
	}
	
	public function driverDocumentList($id){
	   
		$driverHistory = DB::table('driverdocument')->where('driver_id', $id)->paginate(); 
		
		return view('driver/doclist')->with(compact('driverHistory','id'));
		
	}
	
	public function driverDocumentEdit($id){
		
	
		
	return view('driver/dacEdit')->with(compact('id'));	
	}
	
	public function updateDocument(Request $request){
		$input = $request->all();
		
			 
		$vehicle_insurance = microtime().'.'.$request->vehicle_insurance->extension();  
   
        $request->vehicle_insurance->move(public_path('driverdoc'), $vehicle_insurance);
		
		$driving_license = microtime().'.'.$request->driving_license->extension();  
   
        $request->driving_license->move(public_path('driverdoc'), $driving_license);
		
		$driver_id_proof = microtime().'.'.$request->driver_id_proof->extension();  
   
        $request->driver_id_proof->move(public_path('driverdoc'), $driver_id_proof);
		
		$id = $request->id;
		$data = [ 'vehicle_insurance' => $vehicle_insurance,
		'driving_license' => $driving_license,
		'driver_id_proof' => $driver_id_proof,
		
		];
		$check = DB::table('driverdocument')->where('id', $id)->first();
		
		if(empty($check)){
		
		Driverdoc::create($data);
		}else{
			
		DB::table('driverdocument')->where('driver_id', $id)->update($data); 		
		
		}
		
		Session::flash('flash_message', 'Driver document update successfully');
		Session::flash('alert-class', 'alert-success');
		 
		return redirect('driver');
		
	}
	
	
	
	
	
	
	public function driverDocument($id){
		
    return view('driver/dacument')->with(compact('id'));
	}
	
	
	public function uploadDocument(Request $request){
		$input = $request->all();
		 
		$vehicle_insurance = microtime().'.'.$request->vehicle_insurance->extension();  
   
        $request->vehicle_insurance->move(public_path('driverdoc'), $vehicle_insurance);
		
		$driving_license = microtime().'.'.$request->driving_license->extension();  
   
        $request->driving_license->move(public_path('driverdoc'), $driving_license);
		
		$driver_id_proof = microtime().'.'.$request->driver_id_proof->extension();  
   
        $request->driver_id_proof->move(public_path('driverdoc'), $driver_id_proof);
		
		$user_id = $request->user_id;
		$data = [ 'vehicle_insurance' => $vehicle_insurance,
		'driving_license' => $driving_license,
		'driver_id_proof' => $driver_id_proof,
		'driver_id'=> $user_id
		
		];
		$check = DB::table('driverdocument')->where('driver_id', $user_id)->first();
		
		if(empty($check)){
		
		Driverdoc::create($data);
		}else{
			
			
		DB::table('driverdocument')->where('driver_id', $user_id)->update($data); 		
		
		}
		
		Session::flash('flash_message', 'Driver document uploaded successfully');
		Session::flash('alert-class', 'alert-success');
		 
		return redirect('driver');
	}
	
	public function driverApporved($id,$block_status){
		if($block_status == 3){
			
			$b_status = 4;
			
		}else{
			$b_status = 3 ;
			
		}
		
	$data = [
        'block_status' => $b_status
	];

		
	 $user = DB::table('users')->where('id',$id)->update($data);
	 
	 if($block_status == 4){
			
	 Session::flash('flash_message', 'Driver Un-
	 Apporved successfully');
	 Session::flash('alert-class', 'alert-success');
			
	}else{
		Session::flash('flash_message', 'Driver Apporved successfully');
	 Session::flash('alert-class', 'alert-success');
	}
	 
	 return redirect('driver');	
		
		
	}
	
	
	
	
	
	
	
}
