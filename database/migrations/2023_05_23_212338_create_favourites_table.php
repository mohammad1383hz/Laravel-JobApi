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
        Schema::create('favourites', function (Blueprint $table) {
            $table->foreignId('job_id')
            ->nullable()
            ->constrained('jobs')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites');
    }
};
