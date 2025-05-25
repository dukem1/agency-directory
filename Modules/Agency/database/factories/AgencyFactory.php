<?php

namespace Modules\Agency\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Mmo\Faker\PicsumProvider;

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
        $this->faker->addProvider(new PicsumProvider($this->faker));
        $filepath = storage_path('app/public/agencies');
        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        }

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'logo' => $this->faker->picsum($filepath, 30, 30, false),
        ];
    }
}

