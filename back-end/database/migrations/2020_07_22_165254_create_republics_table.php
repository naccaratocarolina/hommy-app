<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('street');
            $table->integer('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('imagem_1')->nullable();
            $table->string('imagem_2')->nullable();
            $table->string('imagem_3')->nullable();
            $table->string('category');
            $table->float('rental_per_month');
            $table->float('footage');
            $table->integer('number_bath')->nullable();
            $table->integer('number_bed')->nullable();
            $table->boolean('parking')->nullable();
            $table->boolean('animals')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('republics', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
;
