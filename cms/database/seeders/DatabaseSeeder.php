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

        // $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        // $this->call(TagTableSeeder::class);
        // $this->call(UserTagTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        // $this->call(FollowsTableSeeder::class);
        


    }
}