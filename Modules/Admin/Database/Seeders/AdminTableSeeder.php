<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Model::unguard();
        DB::table('admins')->insert([
            'name' => 'Damian',
            'email' => 'damianbialkowski8@gmail.com',
            'password' => bcrypt('test'),
            'active' => 1,
            'role_id' => 1,
            'updated_by' => 1,
            'created_by' => 1,
        ]);
    }
}
