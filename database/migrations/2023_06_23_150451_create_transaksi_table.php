<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_trx', 10)->primary();
            $table->string('id_kaset', 10)->index('id_kaset');
            $table->string('id_penyewa', 10)->index('id_penyewa');
            $table->integer('jumlah_sewa');
            $table->integer('total_harga');
            $table->date('tanggal_penyewaan');
            $table->date('tanggal_pengembalian');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}