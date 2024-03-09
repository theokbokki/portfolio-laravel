<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
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
        $date = fake()->dateTimeBetween('-6 years', 'now')->setTimezone(timezone_open('Europe/Berlin'));

        return [
            'title' => fake()->sentence(rand(8, 20)),
            'excerpt' => fake()->paragraph(rand(1, 5)),
            'published_at' => Carbon::parse($date, 'Europe/Berlin'),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
