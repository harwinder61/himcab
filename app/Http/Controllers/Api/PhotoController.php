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
use App\Dummyimage;
use DB;

class PhotoController extends Controller 
{
	public $successStatus = true;
    public $failStatus = false;

    public function index(Request $request)
    {
    	if($img = $request->hasfile('image'))
    	{
    		$image = $request->file('image');

    		$destinationPath 		= public_path('/dummyimage/'); // upload path
    		$driver_licenceImage 	= time() . "." . $image->getClientOriginalExtension();

    		$image->move($destinationPath, $driver_licenceImage);

    		$document = Dummyimage::create([
               				'image' 			=> $driver_licenceImage,
               				
	        ]);

	        $data = [];

        	return response()->json([
	            'status' => $this->successStatus,
	            'message'=> "Image upload successfully",
	            'data'   => $data
	        ], 200);

    	}else{
    		$data = [];
            return response()->json([
                'status' => $this->failStatus,
                'message' => 'image not uploaded',
                'data'   => $data
            ], 400);
    	}
    }

}