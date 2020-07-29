<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Table that alters User Table after its creation
 */

class AlterUserTable extends Migration {
    public function up() {
      Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('republic_id')->nullable();
      });

      Schema::table('users', function (Blueprint $table) {
        $table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('republic_id');
      });
    }
}
