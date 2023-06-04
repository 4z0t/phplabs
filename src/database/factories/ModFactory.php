<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mod>
 */
class ModFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" =>  $this->unique()->name(),
            "description" => $this->faker->text(),
            "major_version" => $this->faker->randomNumber(),
            "minor_version" => $this->faker->randomNumber(),
            "patch_version" => $this->faker->randomNumber(),
            "link" => $this->faker->url(),
            "creation_time" => now(),
        ];
    }
}
