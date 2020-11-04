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

class PromocodeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function promocode()
    { 

       $promo = DB::table('promocode')->select('promocode_name','promocode_type','offer_value','usage_limit','expire_date','status')->get();
       return view('promocode/promocode_list')->with(compact('promocode'));
    }
    
    public function createPromocode(){
     return view('promocode/create');   
    }
    
    public function postPromocode(Request $request){

        $input = $request->all();
        $validator = Validator::make($request->all(), [ 
           'promocode_name' => 'required',
           'promocode_type' => ' required',
           'offer_value' => 'required',
           'usage_limit' => 'required',
           'expire_date' => 'required',
           'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($input)->withErrors($validator->errors());
        }
    
        $data = [
        'promocode_name' => $request->promocode_name,       
        'promocode_type' => $request->promocode_type,
        'offer_value' => $request->offer_value,
        'usage_limit' =>$request->usage_limit, 
        'expire_date' =>$request->expire_date, 
        'status' =>$request->status, 
        ];

        DB::table('promocode')->insert($data);
        Session::flash('flash_message', 'Promocode create successfully');
        Session::flash('alert-class', 'alert-success');
         return redirect('/promocode');
    }
    
}
