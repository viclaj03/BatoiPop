<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::all();
        $articles->each(function ($article){
            Photo::factory()->count(rand(1,3))->create(['id_article'=>$article->id]);
        });
    }
}
