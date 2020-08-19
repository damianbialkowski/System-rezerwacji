<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Article;
use Modules\Blog\Entities\Category;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Article::truncate();
        $faker = new \Faker\Generator();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $categories = Category::all();
        foreach ($categories as $category) {
            $title = $faker->sentence(5);
            $randomNumberOfSentences = mt_rand(50, 300);
            $content = $faker->sentence($randomNumberOfSentences);
            $article = new Article;
            $data = [
                'domain_id' => 1,
                'title' => $title,
                'ordering' => $article->getNextOrdering($article),
                'author_id' => 0,
                'introduction' => str_limit($content, 250),
                'content' => $content,
                'active' => 1,
                'published' => 1,
                'published_at' => \Carbon\Carbon::now(),
            ];
            $item = $article->create($data);
            $item->categories()->attach($category->id);
        }
    }
}
