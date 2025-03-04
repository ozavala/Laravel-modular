<?php

namespace Modules\Serials\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Serials\Models\Serial;

class SerialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Serial::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'serial' => Str::random(32),
            'notes' => $this->faker->sentence(),
        ];
    }
}

