<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('ext_id')->nullable();
            $table->unsignedBigInteger('city_id')->index();
            $table->json('name')->nullable();
            $table->json('slug')->nullable();
            $table->json('short_content')->nullable();
            $table->json('content')->nullable();
            $table->json('active')->nullable();
            $table->json('params')->nullable();

            $table->foreign('city_id')->references('id')->on('cities');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
