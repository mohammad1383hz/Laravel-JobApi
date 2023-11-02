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
        Schema::create('detail_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_job_id')
            ->nullable()
            ->constrained('detail_jobs')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->longtext('gender')->nullable();
            $table->string('educational_degree')->nullable();
            $table->string('price')->nullable();

            // skills many to many

            $table->timestamps();
        });
        Schema::create('job_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')
            ->nullable()
            ->constrained('jobs')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('skills_id')
            ->nullable()
            ->constrained('skills')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            // skills many to many

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
        Schema::dropIfExists('detail_ads');
    }
};
