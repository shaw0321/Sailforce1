<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_title' => $this->faker->realText(20),
            'post_desc' => $this->faker->realText(50),
            'post_body' => $this->faker->realText(200),
            'post_status' =>'1',
            'created_at' => $this->faker->datetime(),
            'user_id' => function(){
                return User::all() ->random();
            }
            //
        ];
    }
}
