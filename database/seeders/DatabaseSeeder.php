<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        //types
        $this->call(PaymentValueSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(ProcessTypeSeeder::class);

        //process
        $this->call(ProcessSeeder::class);
        $this->call(ProcessPeopleSeeder::class);
        $this->call(ProcessPaymentSeeder::class);

        //payment user
    }
}
