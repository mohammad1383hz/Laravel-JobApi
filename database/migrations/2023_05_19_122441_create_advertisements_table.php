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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('company_id')
            ->nullable()
            ->constrained('companies')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('province_id')
            ->nullable()
            ->constrained('provinces')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('city_id')
            ->nullable()
            ->constrained('cities')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            // $table->string('description')->nullable();

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
        Schema::dropIfExists('advertisements');
    }
};
