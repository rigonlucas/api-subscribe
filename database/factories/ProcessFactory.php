<?php

namespace Database\Factories;

use App\Models\ProcessType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
 */
class ProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'process_type_id' => ProcessType::factory()->create(),
            'name' => $this->faker->word(),
            'description' => $this->faker->text(100),
            'tamb_link' => $this->faker->text(100),
            'is_active' => $this->faker->boolean(),
            'is_public' => $this->faker->boolean(),
            'start_at' => Carbon::now()->subDay(rand(1, 90)),
            'finish_at' => Carbon::now()->addDay(rand(0, 90))
        ];
    }
}
