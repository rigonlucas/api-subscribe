<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProcessPeople>
 */
class ProcessPeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /** @var Process $process */
        $process = Process::all()->random();
        return [
            'uuid' => $this->faker->uuid(),
            'process_id' => $process->id,
            'user_id' => User::factory()->create()
        ];
    }
}
