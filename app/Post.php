<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'caption', 'image'
    ];



    public function user()
    {
        return $this->belongsTo(User::Class);

    }


    public function getRouteKeyName()
    {

        return "slug";

    }

}
