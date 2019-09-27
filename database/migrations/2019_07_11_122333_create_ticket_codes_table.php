<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_trans');
            $table->foreign('id_trans')->references('id')->on('transactions');
            $table->string('kode_tiket', 100);
            $table->boolean('cek_in')->default(0);
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
        Schema::dropIfExists('ticket_codes');
    }
}
