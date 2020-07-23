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
            $table->string('name')
            $table->string('street');
            $table->integer('number');
            $table->string('state');
            $table->string('city');
            $table->string('imagem_1')->nullable();
            $table->string('imagem_2')->nullable();
            $table->string('imagem_3')->nullable();
            $table->string('category');
            $table->float('rental_per_month');
            $table->integer('footage');
            $table->integer('number_bath');
            $table->integer('number_bed');
            $table->boolean('parking');
            $table->boolean('animals');
            $table->longText('description')->nullable();
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
