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
            $table->string('nama', 250);
            $table->string('email', 100)->unique();
            $table->string('password',100);
            $table->string('nama_bank',200)->nullable();
            $table->string('nama_akun',200)->nullable();
            $table->string('no_rek',30)->unique()->nullable();
            $table->string('no_telp',13)->unique()->nullable();
            $table->string('nama_kampus',200);
            $table->string('foto_ktm', 200)->nullable();
            $table->string('foto_ktp', 200)->nullable();
            $table->string('foto', 200)->nullable()->default('foto/default.png');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('organizers');
    }
}
