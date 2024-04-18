<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;

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
            //

            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'description' => $this->faker->sentence,
            'image_url' => $this->$faker->imageUrl(),
            //'user_id' => 1,
            'user_id' => User::inRandomOrder()->first()->id, // Sélectionnez un utilisateur aléatoire existant
        ];
    }
}
