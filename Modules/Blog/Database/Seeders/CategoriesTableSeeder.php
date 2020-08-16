<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = [
            'E-commerce',
            'Programming',
            'Backend',
            'Frontend',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description' => 'description of ' . $category,
            ]);
        }
    }
}
