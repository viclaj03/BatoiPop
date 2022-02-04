<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->unique()->references('id')->on('messages')->onDelete('cascade');
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
        Schema::dropIfExists('report_message');
    }
}
