<?php

namespace Modules\Agency\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Agency\Models\Agency::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'logo' => $this->faker->imageUrl(),
        ];
    }
}

