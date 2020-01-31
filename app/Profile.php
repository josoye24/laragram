<?php

namespace App;
use App\User;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

   
   
    public function user()
    {
        return $this->belongsTo(User::Class);
    }


    
    public function followers()
    {
        return $this->belongsToMany(User::Class);
    }


    
    public static function userProfile()
    {
        $user = Auth::user();
        Session::put("user", $user);

        return $user;
    }

    public static function postCount()
    {
        $user = Session::get("user");
        
        $postCount = Cache::remember(
            'count.post' .$user->id, 
            now()->addSecond(5), 
            function () use ($user) {
            return $user->posts->count();
        }); 

        return $postCount;
    }

    public static function followerCount()
    {
        $user = Session::get("user");
        
        $followerCount = Cache::remember(
            'count.follower' .$user->id, 
            now()->addSecond(5), 
            function () use ($user) {
            return $user->profile->followers->count();
        }); 
        

        return $followerCount;
    }

    public static function followingCount()
    {
        $user = Session::get("user");
        
        $followingCount = Cache::remember(
            'count.following' .$user->id, 
            now()->addSecond(5), 
            function () use ($user) {
            return $user->following->count();
        });
   

        return $followingCount;
    }


}

