<?php

namespace Database\Factories;

use App\Models\{Question, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question'   => fake()->realText(50),
            'draft'      => fake()->boolean(),
            'created_by' => User::factory(),
        ];
    }
}
