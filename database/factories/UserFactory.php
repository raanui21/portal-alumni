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
        $religions = ['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'Judaism'];
        return [
            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make('password'),
            // 'remember_token' => Str::random(10),
            'id' => Str::uuid(),
            'email' => fake()->unique()->safeEmail(),
            'email_pribadi' => fake()->unique()->safeEmail(),
            'nama' => $this->faker->name,
            'nim' => $this->faker->numberBetween(100000, 999999),
            'agama' => $this->faker->randomElement($religions),
            'jenis_kelamin' => $this->faker->randomElement([
                'Laki-Laki',
                'Perempuan',
            ]),

            'fakultas' => $this->faker->randomElement(['Fakultas Teknik', 'Fakultas Ekonomi', 'Fakultas Hukum', 'Fakultas Kedokteran', 'Fakultas Ilmu Sosial dan Politik']),
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Manajemen', 'Hukum', 'Kedokteran', 'Administrasi Publik']),

         
            'no_hp' => '08' . $this->faker->randomNumber(9, true),

            'image_path' => $this->faker->imageUrl($width = 640, $height = 480),
            'role' => 'alumni',
            'password' => (static::$password ??= Hash::make('password')),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(
            fn(array $attributes) => [
                'email_verified_at' => null,
            ],
        );
    }
}
