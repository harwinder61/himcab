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
use App\Country;
use App\Localization;
use App\State;
use App\City;


class LocalizationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function LocalizationList()
    {  
	   $Localization = Localization::with('getcity','getState','getCountry')->paginate();
	   
	   return view('localization/localization_list')->with(compact('Localization'));
    }
	

    public function Localization()
    {  //die('dfsdfsdf');
	   $Country = Country::get();
	  
	   return view('localization/create')->with(compact('Country'));
    }
	
	
	
	public function state(Request $request){
		$input = $request->all();
		$country_id = $request->country_id;
		$state = DB::table('tbl_states')->where('country_id',$country_id)->get();
		
		//echo '<pre>'; print_r($state); die;
		
                echo  '<option value="">Select State</option>';
				   foreach($state as $value ){
				  $state_id =	$value->id;   
				  echo'<option value='.$state_id.' >'; 
				  echo $value->name ; 
				  echo '</option>';
				   }
		
	}
	
	public function states(Request $request){
		
		
		$input = $request->all();
		//echo '<pre>'; print_r($input); die;
		
		$country_id = $request->country_id;
		$state = DB::table('tbl_states')->where('country_id',$country_id)->get();
		
                echo  '<option value="">Select State</option>';
				   foreach($state as $value ){
				  $state_id =	$value->id;   
				  echo'<option value='.$state_id.' >'; 
				  echo $value->name ; 
				  echo '</option>';
				   }
		
	}
	
	
	public function city(Request $request){
		$input = $request->all();
		$country_id = $request->state_id;
		$state = DB::table('tbl_cities')->where('state_id',$country_id)->get();
		
                echo  '<option value="">Select City</option>';
				   foreach($state as $value ){
				  $city_id =	$value->id;   
				  echo'<option value='.$city_id.' >'; 
				  echo $value->name ; 
				  echo '</option>';
				   }
		
	}
	
	public function citys(Request $request){
		$input = $request->all();
		$country_id = $request->state_id;
		$state = DB::table('tbl_cities')->where('state_id',$country_id)->get();
		
                echo  '<option value="">Select City</option>';
				   foreach($state as $value ){
				  $city_id =	$value->id;   
				  echo'<option value='.$city_id.' >'; 
				  echo $value->name ; 
				  echo '</option>';
				   }
		
	}
	
	
	public function postLocalization(Request $request){
		$input = $request->all();
		
		$data = ['country_id' => $request->Country_id,
		'state_id' => $request->state_id,
		'city_id' => $request->city_id
		];
		
	$localization = DB::table('localization')->insert($data);
		
	 Session::flash('flash_message', 'Data Inserted successfully');
	 Session::flash('alert-class', 'alert-success');
	 return redirect('LocalizationList');
		
		
	}
	
	
	public function LocalizationDelete($id){
	
	 DB::table('localization')->where('id',$id)->delete();
	 Session::flash('flash_message', 'Data deleted successfully');
	 Session::flash('alert-class', 'alert-success');
	 return redirect('LocalizationList');
	}
	
	public function editLocalization($id){
	
	 
	 
	
	 $Country = Country::get();
	 $State = State::get();
	 $City = City::get();
	 
	 return view('localization/edit')->with(compact('id','State','City','Country'));
	}
	
	public function updateLocalization(Request $request){
	 
		$data = ['country_id' => $request->Country_id,
		'state_id' => $request->state_id,
		'city_id' => $request->city_id
		];
		
     DB::table('localization')->where('id',$request->id)->update($data);
	   
       
	 Session::flash('flash_message', 'Data  updated successfully');
	 Session::flash('alert-class', 'alert-success');
	 return redirect('LocalizationList');
	}
	
	
	
	
	
	
	
}
