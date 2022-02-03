<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Message;
use App\Models\ReportArticle;
use App\Models\ReportMessage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(ValorationSeeder::class);
        $this->call(ReportArticleSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ReportMessageSeeder::class);
        $this->call(TagSeeder::class);
    }
}
