<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator,Redirect,Response;
use Hash;
use Session; 
use App\User;
use App\Blog;
use App\DriverHistory;
use App\Driverdoc;

class DashboardController extends Controller
{
    
   

    public function index()
    { 
      $blog_list = Blog::orderBy('id','desc')->limit(3)->get();
      return view('web.index')->with(compact('blog_list'));

    }

    
   
    
    
    
}
