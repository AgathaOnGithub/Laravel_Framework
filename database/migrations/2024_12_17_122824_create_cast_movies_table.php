<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('cast_movies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('movie_id');
            $table->uuid('cast_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cast_movies');
    }
}
