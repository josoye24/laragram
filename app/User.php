<?php

namespace App;
use App\Post;
use App\Profile;
use App\Mail\NewWelcomeMail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    protected static function boot()
    {
       
        parent::boot(); 
        static::created(function ($user){
            $user->profile()->create([
                "bio" => "About me",
                "location" => "City",
                "profession" => "Profession",
                "website"=> "https://laragram.ziontech.com.ng",
                "image" => "profile/CljhJRj7hWJCUyf2jtUVEXN2DTHSb1oHb0Bdu7dd.jpeg"
            ]);

            Mail::to($user->email)->send(new NewWelcomeMail());
        });
        
        
    }

    public function profile()
    {
        return $this->hasOne(Profile::Class);
    }



    public function following()
    {
        return $this->belongsToMany(Profile::Class);
    }



    public function posts()
    {
        return $this->hasMany(Post::Class)->orderBy("created_at", "desc");
    }


    public function getRouteKeyName()
    {

        return "username";

    }

}
