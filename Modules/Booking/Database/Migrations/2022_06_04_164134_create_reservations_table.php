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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cms_user_id');
            $table->unsignedBigInteger('room_id');

            $table->date('date_from');
            $table->date('date_to');

            $table->foreign('cms_user_id')->references('id')->on('cms_users');
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->decimal('total_price')->default(0);

            $table->timestamp('cancelled_at')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
