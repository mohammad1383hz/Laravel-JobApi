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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('company_id')
            ->nullable()
            ->constrained('companies')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('advertisement_id')
            ->nullable()
            ->constrained('advertisements')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('resome_id')
            ->nullable()
            ->constrained('resomes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            // $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('requests');
    }
};
