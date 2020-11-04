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

class BlogController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // { 
    //   $blog_list = Blog::orderBy('id','asc')->paginate(3);
    //   return view('web.blog')->with(compact('blog_list'));

    // }

    public function blogs()
    { 
      $blog_list = Blog::orderBy('id','desc')->paginate();
      return view('blog/list')->with(compact('blog_list'));

    }

    public function createBlog(Request $request)
    {
      return view('blog/create');  
    }

    public function postBlog(Request $request)
    {

      $input = $request->all();

      $validator = Validator::make($request->all(), [ 
           'blog' => 'required',
          
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

      ]);
    
    
    if ($validator->fails()) {
      return redirect()->back()->withInput($input)->withErrors($validator->errors());
    }

     if ($request->hasFile('image'))

     {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/blog');
        $image->move($destinationPath, $imagename);
        
      
      }
      $data = [
        'title' => $request->title,
        'url'   => str_replace(" ","-",$request->title),
        'blog'  => $request->blog, 
        'image' => $imagename,
      ];
    
    
    DB::table('blog')->insert($data);
    Session::flash('flash_message', 'Blog added successfully');
    Session::flash('alert-class', 'alert-success');
    
     return redirect('blogs');
  }
  


    public function BlogDelete($id)
    {
      DB::table('blog')->where('id',$id)->delete();
      Session::flash('flash_message', 'Blog deleted successfully');
      Session::flash('alert-class', 'alert-success');
      return redirect('blogs');
    }

    public function editBlog($id)
    {
      $blogdetail = DB::table('blog')->where('id',$id)->first(); 
      return view('blog/edit')->with(compact('blogdetail'));
    }

    public function updateBlog(Request $request)
    {

      

      if(empty($request->hasFile('image'))) 
      {
        $data = [
               
            'title' => $request->title,
      'url' => str_replace(" ","-",$request->title),
        'blog' => $request->blog, 
          ];
    
    
          DB::table('blog')->where('id',$request->blog_id)->update($data);
     
        }
    else{
      $image = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('blog'), $image);
    
     
    $data = [
      'title' => $request->title,
      'url' => str_replace(" ","-",$request->title),
        'blog' => $request->blog, 
        'image' => $image,
  
  
    ];

    echo "<pre/>"; print_r($data); die('data');
    
    
       DB::table('blog')->where('id',$request->blog_id)->update($data);
     } 
   
   Session::flash('flash_message', 'Blog updated successfully');
   Session::flash('alert-class', 'alert-success');
   return redirect('blogs');
  }
    
   
    
    
    
}
