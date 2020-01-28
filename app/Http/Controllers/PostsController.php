<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;




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
        $posts = Post::whereIn("user_id", $users)->with("user")->latest("created_at")->paginate(5);
        $stories = Post::inRandomOrder()->limit(4)->get();
        $newFollowers = User::inRandomOrder()->limit(5)->get();

        
        return view("posts.index", compact("posts", "stories", "newFollowers", "users"));
        
    }


    public function create()
    {
        return view("posts.create");
    }


    public function store()
    {
        $data = request()->validate([
            "caption" => "required",
            "slug" => "",
            "image" => "required|image"
        ]);        

        //store image to public directory
        $imagePath = request("image")->store("upload", "public");

        //resize and fit image using intervention image library
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();


        //get image file name as slug
        $slug = Str::substr($imagePath, 7, 20);


        //create post with auth user ID

        
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->caption = $data["caption"];
        $post->slug = $slug;
        $post->image = $imagePath;
        $post->save();


        //return to user profile     
      
        return redirect("/profile/" . auth()->user()->username)->withpost_status(__('Post successfully created.'));
    }

    public function show(Post $slug)
    {
        $post = $slug;

        return view("posts.show", compact("post"));

    }
}
