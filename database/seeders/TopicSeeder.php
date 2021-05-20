<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics=[
            ["title"=>"Sinema" ,"description" => "Lorem Ipsum is simply dummy" ,"image_url" => "https://i.pinimg.com/564x/d5/eb/a5/d5eba595ec93552e08be0e19844824ad.jpg"],
            ["title"=>"Kitap","description" => "Lorem Ipsum available, but the majority " ,"image_url" => "https://i.pinimg.com/564x/d5/eb/a5/d5eba595ec93552e08be0e19844824ad.jpg"],
            ["title"=>"Teknoloji","description" => "He standard chunk of Lorem Ipsum used since the 1500s" ,"image_url" => "https://i.pinimg.com/564x/d5/eb/a5/d5eba595ec93552e08be0e19844824ad.jpg"],
            ["title"=>"Mühendislik","description" => "All the Lorem Ipsum generators on the Internet" ,"image_url" => "https://i.pinimg.com/564x/d5/eb/a5/d5eba595ec93552e08be0e19844824ad.jpg"]

        ];
        foreach($topics as $topic){
            Topic::create($topic);
        }
    }
}
