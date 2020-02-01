<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $users)
    {
        

        $follows = (auth()->user()->following->contains($users->id) ? true : false);

        $user = Auth::user();

        $profilePost = $users->posts()->latest("created_at")->paginate(15);
        

        $usersPostCount = Cache::remember(
            'users.count.post' .$users->id, 
            now()->addSecond(5), 
            function () use ($users) {
            return $users->posts->count();
        }); 

        $usersFollowerCount = Cache::remember(
            'users.follower' .$users->id, 
            now()->addSecond(5), 
            function () use ($users) {
            return $users->profile->followers->count();
        }); 

        $usersFollowingCount = Cache::remember(
            'users.following' .$users->id, 
            now()->addSecond(5), 
            function () use ($users) {
            return $users->following->count();
        });
       
        return view('profile.index', compact("follows", "users", "user", "usersPostCount", "usersFollowerCount", "usersFollowingCount", "profilePost"));
    }


    
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $this->validate(request(),[
            "name" => "required|min:3",
            "username" => "required|min:3",
            "email" => "required|email"
        ]);
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function info(Request $request)
    {
        $user = Auth::user(); 

        $this->authorize("update", $user->profile);

        $data = request()->validate([
            "bio" => "required|min:3",
            "location" => "",
            "profession" => "",
            "website" => "url",
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

        

        return back()->withinfo_status(__('Profile successfully updated.'));

    }

}
