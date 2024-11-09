<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Tun Tun',
            'is_admin' => '1',
            'email' => 'tun@gmail.com',
            'password' => Hash::make('admin12'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 4,
            'profile_img' => 'default.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet optio quidem voluptates cumque id quasi obcaecati impedit unde soluta, recusandae incidunt vitae libero reiciendis quas ea saepe est ratione necessitatibus!',
            'facebook_link' => 'www.facebook',
            'youtube_link' => 'www.youtube'
        ]);
    }
}


