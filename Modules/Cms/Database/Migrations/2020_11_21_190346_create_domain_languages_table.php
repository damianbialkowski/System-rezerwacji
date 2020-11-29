<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('domain_languages')) {
            Schema::create('domain_languages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('domain_id')
                    ->unsigned()
                    ->index();
                $table->foreign('domain_id')
                    ->references('id')
                    ->on('domains')
                    ->onDelete('cascade');
                $table->bigInteger('language_id')
                    ->unsigned()
                    ->index();
                $table->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_languages');
    }
}
