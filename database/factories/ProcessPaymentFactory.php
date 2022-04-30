<?php

namespace Database\Factories;

use App\Models\PaymentType;
use App\Models\PaymentValue;
use App\Models\Process;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProcessPayment>
 */
class ProcessPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payment_type_id' => PaymentType::factory()->create(),
            'process_id' => Process::factory()->create(),
            'payment_value_id' => PaymentValue::factory()->create()
        ];
    }
}
