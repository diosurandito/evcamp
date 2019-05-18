<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('password',100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_rek',30)->unique()->nullable();
            $table->string('no_telp',13)->unique()->nullable();
            $table->string('nama_kampus',100);
            $table->string('foto_ktm', 100)->nullable();
            $table->string('foto_ktp', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->boolean('deleted')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('organizers');
    }
}
