<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use App\Models\PaymentValue;
use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTypes = PaymentType::all();
        $paymentValues = PaymentValue::all();
        $processes = Process::active()->get();

        foreach ($processes as $process) {
            \App\Models\ProcessPayment::factory(rand(1, $paymentTypes->count()))->create([
                'payment_type_id' => $paymentTypes->random(),
                'process_id' => $process->id,
                'payment_value_id' => $paymentValues->random(),
            ]);
        }
    }
}
