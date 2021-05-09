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
                $table->unsignedBigInteger('domain_id');
                $table->json('name');
                $table->json('slug');
                $table->unsignedInteger('author_id');
                $table->json('introduction');
                $table->json('content');
                $table->boolean('active')->default(1);
                $table->boolean('published')->default(0);
                $table->timestamp('published_at')->nullable();
                $table->integer('created_by')->nullable()->unsigned();
                $table->integer('updated_by')->nullable()->unsigned();
                $table->timestamps();
                $table->softDeletes();

                $table->index('domain_id');
                $table->foreign('domain_id')->references('id')->on('domains');

                $table->index('author_id');
                $table->foreign('author_id')->references('id')->on('admins');
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
