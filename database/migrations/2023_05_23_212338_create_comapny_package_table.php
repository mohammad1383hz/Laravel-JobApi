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
        Schema::create('company_package', function (Blueprint $table) {
            $table->foreignId('company_id')
            ->nullable()
            ->constrained('companies')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('package_id')
            ->nullable()
            ->constrained('packages')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('status')->nullable();
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
