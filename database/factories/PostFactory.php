<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'user_id'=>rand(1,2),
            'category_id'=>rand(1,5),
            'title'=>$this->faker->sentence(rand(8,12)),
            'slug'=>$this->faker->slug(),
            'excerpt'=>$this->faker->text(rand(250,300)),
            'body'=>$this->faker->paragraphs(rand(10,15),true),
            

        ];
    }
}
