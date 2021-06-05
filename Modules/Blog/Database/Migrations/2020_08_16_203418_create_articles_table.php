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
                $table->json('domain_id')->nullable();
                $table->json('name');
                $table->json('slug');
                $table->unsignedInteger('author_id');
                $table->json('introduction')->nullable();
                $table->json('content')->nullable();
                $table->boolean('active')->default(1);
                $table->boolean('published')->default(0);
                $table->timestamp('published_at')->nullable();
                $table->integer('created_by')->nullable()->unsigned();
                $table->integer('updated_by')->nullable()->unsigned();
                $table->timestamps();
                $table->softDeletes();

                $table->index('author_id');
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
