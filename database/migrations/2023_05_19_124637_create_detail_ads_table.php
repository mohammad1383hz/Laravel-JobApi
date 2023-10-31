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
        Schema::create('detail_ads', function (Blueprint $table) {
            $table->id();
            $table->longtext('gender')->nullable();
            $table->string('educational_degree')->nullable();
            $table->string('price')->nullable();

            // skills many to many

            $table->timestamps();
        });
        Schema::create('detail_ad_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_ad_id')
            ->nullable()
            ->constrained('detail_ads')
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
