<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->regexify('[a-z]{1,15}');

        return [
            'name' => $name,
            'username' => $name,
            'password' => Hash::make('2'),
            'no_hp' => '0812' . $this->faker->unique()->numerify('######'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
