<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->increments('id');
                $table->json('title');
                $table->json('slug');
                $table->json('introduction');
                $table->json('content');
                $table->integer('category_id')->unsigned();
                $table->boolean('active')->default(1);
                $table->integer('updated_by')->unsigned()->default(null);
                $table->integer('created_by')->unsigned();
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
        Schema::dropIfExists('articles');
    }
}
