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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('phone')->nullable();
            $table->string('brand')->nullable();
            $table->string('web_site')->nullable();
            $table->string('src_logo')->nullable();

            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->string('password');
            $table->bigInteger('company_security_id')->nullable();



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
        Schema::dropIfExists('companies');
    }
};
