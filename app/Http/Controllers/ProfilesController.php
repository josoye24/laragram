<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except("index");
    }


    public function index(User $user)
    {
        //the line below = ($user) is comment out since we now use route model binding,
        //which can replace find or faill 
        //$user = User::findORFail($user);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $postCount = Cache::remember(
            'count.post' .$user->id, 
            now()->addMinutes(30), 
            function () use ($user) {
            return $user->posts->count();
        }); 

        $followerCount = Cache::remember(
            'count.follower' .$user->id, 
            now()->addMinutes(30), 
            function () use ($user) {
            return $user->profile->followers->count();
        }); 
        
        
        $followingCount = Cache::remember(
            'count.following' .$user->id, 
            now()->addMinutes(30), 
            function () use ($user) {
            return $user->following->count();
        });

        return view('profiles.index', compact("user", "follows", "postCount", "followerCount", "followingCount"));
    }


    public function edit(User $user)
    {
        $this->authorize("update", $user->profile);

        return view('profiles.edit', compact("user"));
    }
    
    
    public function update(User $user)
    {

        $this->authorize("update", $user->profile);

        $data = request()->validate([
            "title" => "required",
            "description" => "required",
            "url" => "url",
            "image" => "image"
        ]);


        if (request("image")){

            $imagePath = request("image")->store("profile", "public");

            //resize and fit image using intervention image library
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ["image" => $imagePath];

        }
        
        //update profiel with auth user ID
        auth()->user()->profile->update(array_merge(
            $data, $imageArray ?? []
        ));

        

        return redirect("/profile/" . auth()->user()->username);

    }


}
