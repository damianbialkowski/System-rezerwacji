<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('parent_id')->nullable();
                $table->integer('lft')->nullable();
                $table->integer('rgt')->nullable();
                $table->integer('depth')->nullable();
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->text('description');
                $table->boolean('active')->default(1);
                $table->integer('updated_by')->nullable();
                $table->integer('created_by')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
}
