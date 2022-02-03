<?php

namespace Database\Seeders;

use App\Models\ReportArticle;
use Illuminate\Database\Seeder;

class ReportArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportArticle::factory()->count(3)->create();
    }
}
