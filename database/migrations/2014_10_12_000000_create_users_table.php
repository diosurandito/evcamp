<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nama', 250);
            $table->string('email', 100)->unique();
            $table->string('password',100);
            $table->string('alamat', 250);
            $table->string('jenis_klmn', 9);
            $table->string('no_telp',13)->unique();
            $table->string('foto', 200)->nullable();
            $table->boolean('verifikasi')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
