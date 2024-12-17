<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastsTable extends Migration
{
    public function up()
    {
        Schema::create('casts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->integer('age');
            $table->text('biodata');
            $table->string('avatar', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('casts');
    }
}

