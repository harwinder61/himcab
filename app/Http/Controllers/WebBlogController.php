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

class WebBlogController extends Controller
{
    
   

    public function index()
    { 
      $blog_list = Blog::orderBy('id','desc')->paginate(3);
      return view('web.blog')->with(compact('blog_list'));

    }

    public function single_blog($id)
    {
    	//$blog_list = Blog::find($id);
        $blog_list = Blog::where('url',$id)->first();
    	return view('web.single_blog')->with(compact('blog_list'));
    }

    
   
    
    
    
}
