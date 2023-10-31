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
        Schema::create('user_property', function (Blueprint $table) {
            $table->foreignId('property_id')
            ->nullable()
            ->constrained('properties')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('property_value_id')
            ->nullable()
            ->constrained('property_value')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
