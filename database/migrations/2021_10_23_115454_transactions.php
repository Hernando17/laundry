<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_outlet');
            $table->string('kode_invoice', 255);
            $table->integer('id_member');
            $table->dateTime('tgl', $precision = 0);
            $table->dateTime('batas_waktu', $precision = 0);
            $table->dateTime('tgl_bayar', $precision = 0);
            $table->integer('biaya_tambahan');
            $table->string('diskon', 255);
            $table->integer('pajak');
            $table->string('status', 255);
            $table->string('dibayar', 255);
            $table->integer('id_user');
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
        //
    }
}
