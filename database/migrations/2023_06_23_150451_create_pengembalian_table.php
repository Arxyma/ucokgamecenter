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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->string('id_pengembalian', 10)->primary();
            $table->string('id_trx', 10)->index('id_penyewa');
            $table->date('tanggal_dikembalikan');
            $table->string('keterlambatan', 2);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->index(['id_trx'], 'id_trx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
};
