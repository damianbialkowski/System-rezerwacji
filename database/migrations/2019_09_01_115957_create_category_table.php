<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content',255);
            $table->boolean('is_subcategory')->default(0);
            $table->integer('parent_id')->default(null);
            $table->boolean('visible')->default(1);
            $table->string('slug');
            $table->integer('updated_by')->default(null);
            $table->integer('created_by')->default(null);
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
        Schema::dropIfExists('category');
    }
}
