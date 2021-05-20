<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'email' => 'aysetas@gmail.com',
            'password' => bcrypt(123456),
            'user_type' =>'standart',
            'bio_text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'image_url' => 'https://i.pinimg.com/564x/d5/eb/a5/d5eba595ec93552e08be0e19844824ad.jpg',
            'token' => Str::random(60)
        ]);


    }
}
