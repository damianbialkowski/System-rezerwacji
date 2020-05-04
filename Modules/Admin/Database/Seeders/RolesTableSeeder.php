<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Administrator',
            'description' => 'Default administrator role',
            'permission_type' => 'all',
            'default' => 1
        ]);

        // $this->call("OthersTableSeeder");
    }
}
