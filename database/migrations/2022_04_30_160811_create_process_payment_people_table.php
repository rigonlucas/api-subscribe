<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $processPeopleClass = \App\Models\ProcessPeople::class;
        Schema::create('process_payment_people', function (Blueprint $table) use ($processPeopleClass) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\Process::class);
            $table->foreignIdFor(
                $processPeopleClass,
                \App\Core\Support\Enums\ForeignKeyMutatorEnum::findByCaseName($processPeopleClass)
            );
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_payment_people');
    }
};
