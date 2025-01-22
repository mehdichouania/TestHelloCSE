<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ProfileStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {            
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'image' => $faker->image(storage_path('app/public/images'), 50, 50, false, false),
            'status' => $this->faker->randomElement(array_column(ProfileStatus::cases(), 'value')),
        ];
    }
}