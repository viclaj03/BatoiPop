<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->boolean('accepted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_article');
    }
}
