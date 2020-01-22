<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Auth;
use Intervention\Image\Facades\Image;



class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    


    public function index()
    {
        //$users = auth()->user()->following()->pluck("profiles.user_id");
        $users = auth()->user();
        $posts = Post::whereIn("user_id", $users)->with("user")->latest()->paginate(5);
        
        return view("posts.index", compact("posts"));
        
    }


    public function create()
    {
        return view("posts.create");
    }


    public function store()
    {
        $data = request()->validate([
            "caption" => "required",
            "image" => "required|image"
        ]);
    
        
        
        //must be sign in - implemeted with middleware 
        

        //store image to public directory
        $imagePath = request("image")->store("upload", "public");

        //resize and fit image using intervention image library
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //create post with auth user ID
        auth()->user()->posts()->create([ 
          "caption" => $data["caption"],
           "image" => $imagePath
          ]);

        //return to user profile     
        //$id = auth()->user()->id;
      
        return redirect("/profile/" . auth()->user()->username);
    }

    public function show(Post $post)
    {

        //dd($post);
        return view("profiles.show", compact("post"));

    }
}
