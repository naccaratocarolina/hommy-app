<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Pivot table that establishes a relationship User favorites Republic
 */

class CreateRepublicUserTable extends Migration {
    public function up() {
        Schema::create('republic_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('republic_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('republic_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('republic_user');
    }
}
