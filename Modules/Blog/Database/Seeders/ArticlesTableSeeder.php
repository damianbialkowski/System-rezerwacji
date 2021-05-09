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
        $domain = resolve('Domain');
        $domainLanguage = $domain->default_language;
//        dd($domainLanguage->id);
        $counter = 10;
        $i = 0;
        do {
            $title = $faker->sentence(5);
            $randomNumberOfSentences = mt_rand(50, 300);
            $content = $faker->sentence($randomNumberOfSentences);
            $article = new Article;
            $data = [
                'domain_id' => $domain->id,
                'name' => [$domainLanguage->locale => $title],
                'slug' => [$domainLanguage->locale => str_slug($title)],
                'author_id' => 1,
                'introduction' => [$domainLanguage->locale => str_limit($content, 250)],
                'content' => [$domainLanguage->locale => $content],
                'active' => 1,
                'published' => 0,
            ];
            $item = $article->create($data);
            $i++;
        } while ($i < $counter);
    }
}
