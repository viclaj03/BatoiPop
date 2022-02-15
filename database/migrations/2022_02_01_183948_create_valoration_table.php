<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valorations', function (Blueprint $table) {
            $table->id();
            $table->integer('stars');
            $table->string('commentary')->nullable();
            $table->foreignId('id_user_receptor')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_user_emissor')->references('id')->on('users')->onDelete('cascade');
            //$table->primary(['id_user_receptor','id_user_receptor']);
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
        Schema::dropIfExists('valoration');
    }
}
