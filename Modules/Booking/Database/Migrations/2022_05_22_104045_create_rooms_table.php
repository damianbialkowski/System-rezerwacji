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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('ext_id')->nullable();
            $table->unsignedBigInteger('hotel_id')->index();
            $table->json('name')->nullable();
            $table->json('slug')->nullable();
            $table->json('short_content')->nullable();
            $table->json('content')->nullable();
            $table->json('active')->nullable();

            $table->decimal('cost')->default(0);
            $table->unsignedSmallInteger('quantity_places')->default(1);

            $table->json('params')->nullable();

            $table->foreign('hotel_id')->references('id')->on('hotels');

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
        Schema::dropIfExists('rooms');
    }
};
