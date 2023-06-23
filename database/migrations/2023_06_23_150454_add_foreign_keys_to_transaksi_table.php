<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign(['id_penyewa'], 'transaksi_ibfk_1')->references(['id_penyewa'])->on('penyewa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_kaset'], 'transaksi_ibfk_2')->references(['id_kaset'])->on('kaset')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_ibfk_1');
            $table->dropForeign('transaksi_ibfk_2');
        });
    }
};
