<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
                $table->unsignedInteger('domain_id');
                $table->string('title', 255);
                $table->string('slug', 255)->unique();
                $table->unsignedInteger('ordering');
                $table->unsignedInteger('author_id');
                $table->text('introduction')->nullable();
                $table->longText('content')->nullable();
                $table->boolean('active')->default('1');
                $table->boolean('published')->default(0);
                $table->timestamp('published_at')->nullable();
                $table->integer('updated_by')->nullable()->unsigned();
                $table->integer('created_by')->nullable()->unsigned();
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
        Schema::dropIfExists('articles');
    }
}
