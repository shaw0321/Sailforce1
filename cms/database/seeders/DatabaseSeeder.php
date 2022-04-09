<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Tag; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UserTagTableSeeder::class);
        
        // $userIDs = \App\Models\User::pluck('user_id')->all();
        // $postIDs  = \App\Models\Post::pluck('post_id')->all();
        
        // for($i = 1; $i <= 50; $i++){
        // DB::table('user_tag')->insert([
        //         'user_id' => $userIDs->random(),
        //         'tag_id' =>  $postIDs->random(),
        //     ]);
        // }
        
        // for($i = 1; $i <=20; $i++){
        //     $UserTag =[
        //         'user_id' => random_int(1,100),
        //         'tag_id' =>  random_int(1,100),
        //         ];
        //     DB::table('user_tag')->insert($UserTag);
        // }

    }
}