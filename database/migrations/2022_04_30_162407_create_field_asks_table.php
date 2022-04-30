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
        Schema::create('field_asks', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(\App\Models\FieldGroups::class);
            $table->string('name', 255);
            $table->enum('field_type', []);
            $table->string('format_mask', 100);
            $table->boolean('required');
            $table->string('required_help_text', 255);
            $table->integer('min');
            $table->integer('max');
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
        Schema::dropIfExists('field_asks');
    }
};
