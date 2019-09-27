<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organizer');
            $table->foreign('id_organizer')->references('id')->on('organizers');
            $table->string('nama_event', 200);
            $table->string('deskripsi', 250);
            $table->unsignedInteger('id_campus');
            $table->foreign('id_campus')->references('id')->on('campuses');
            $table->string('detail_lokasi', 200);
            $table->string('kategori_event', 8);
            $table->string('kategori_tiket', 8);
            $table->string('banner', 200);
            $table->integer('jumlah');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('penyelenggara', 200);
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
        Schema::dropIfExists('events');
    }
}
