<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;


class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $users = $user;

        $profilePost = Auth::user()->posts()->latest("created_at")->paginate(15);
        

        $usersPostCount = Cache::remember(
            'users.count.post' .$users->id, 
            now()->addMinutes(30), 
            function () use ($users) {
            return $users->posts->count();
        }); 

        $usersFollowerCount = Cache::remember(
            'users.follower' .$users->id, 
            now()->addMinutes(30), 
            function () use ($users) {
            return $users->profile->followers->count();
        }); 

        $usersFollowingCount = Cache::remember(
            'users.following' .$users->id, 
            now()->addMinutes(30), 
            function () use ($users) {
            return $users->following->count();
        });
       
        return view('profiles.index', compact("follows", "users", "user", "usersPostCount", "usersFollowerCount", "usersFollowingCount", "profilePost"));
    }


}
