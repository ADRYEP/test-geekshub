<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->UnsignedInteger('id_roles');
            $table->foreign('id_roles')->references('id')->on('user_roles');
        });
        Schema::table('users_rentedMovies', function (Blueprint $table) {

            $table->UnsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->UnsignedInteger('id_movie');
            $table->foreign('id_movie')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('id_roles');
            $table->dropColumn('id_roles');
        });
        Schema::table('users_rentedMovies', function (Blueprint $table) {

            $table->dropForeign('id_user');
            $table->dropColumn('id_user');
            $table->dropForeign('id_movie');
            $table->dropColumn('id_movie');
        });
    }
}
