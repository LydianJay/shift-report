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
        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'mname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'contactno' => '09123456789',
            'dob' => now(),
            'position' => fake()->numberBetween(0, 3),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }

   


    public function createAdmin($fname, $mname, $lname, $pos, $pass)
    {
        return $this->state([
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'dob' => now(),
            'email' => 'lloydjayedradan@gmail.com',
            'contactno' => '09157784831',
            'position' => $pos,
            'password' => Hash::make($pass),
        ]);
    }
}
