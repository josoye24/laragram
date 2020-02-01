<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 15)->create();

        DB::table('users')->insert(
            [
                'name' => "Joseph",
                'email' => "user@example.com",
                "username" => "joseph",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        DB::table('profiles')->insert(
            [
                'user_id' => "16",
                'bio' => "My goal is to make every client feel celebrated, I create Classic Pictures that makes the greatest of openings.",
                "location" => "Lagos, Nigeria",
                'profession' => "Photographer",
                'website' => "https://laragram.ziontech.com.ng",
                'image' => "profile/CljhJRj7hWJCUyf2jtUVEXN2DTHSb1oHb0Bdu7dd.jpeg",
            ]
        );
    }
}

