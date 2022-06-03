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
        Schema::create('room_attribute_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->index();
            $table->unsignedBigInteger('attribute_id')->index();
            $table->unsignedBigInteger('attribute_value_id')->index();

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade');
            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
            $table->foreign('attribute_value_id')
                ->references('id')
                ->on('attribute_values')
                ->onDelete('cascade');

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
        Schema::dropIfExists('_attribute_value');
    }
};
