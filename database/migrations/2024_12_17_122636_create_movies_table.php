<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 255);
            $table->text('synopsis');
            $table->string('poster', 255)->nullable();
            $table->year('year');
            $table->boolean('available')->default(true);
            $table->uuid('genre_id');
            
            // Foreign key ke tabel genres
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
