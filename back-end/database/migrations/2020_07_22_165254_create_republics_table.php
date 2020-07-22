<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Users;
use App\Republics;

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
            $table->string('street');
            $table->string('number');
            $table->string('state');
            $table->string('city');
            $table->string('imagem_1');
            $table->string('imagem_2');
            $table->string('imagem_3');
            $table->string('category');
            $table->float('rental_per_month');
            $table->integer('footage');
            $table->integer('number_bath');
            $table->integer('number_bed');
            $table->boolean('parking');
            $table->boolean('animals');
            $table->longText('description');
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
        Schema::dropIfExists('republics');
    }
}
;
