<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class AddNestedsetToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('categories', ['_lft', '_rgt', 'parent_id'])) {
            Schema::table('categories', function (Blueprint $table) {
                //cannot use after in NestedSet
//                NestedSet::columns($table)->after('id');
                $table->unsignedInteger('_lft')->default(0)->after('id');
                $table->unsignedInteger('_rgt')->default(0)->after('id');
                $table->unsignedInteger('parent_id')->nullable()->after('id');
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
        if (Schema::hasColumns('categories', ['_lft', '_rgt', 'parent_id'])) {
            Schema::table('categories', function (Blueprint $table) {
                NestedSet::dropColumns($table);
            });
        }
    }

}
