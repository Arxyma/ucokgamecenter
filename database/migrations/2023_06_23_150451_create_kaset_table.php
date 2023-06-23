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
        Schema::create('kaset', function (Blueprint $table) {
            $table->string('id_kaset', 10)->primary();
            $table->string('judul', 50);
            $table->longText('deskripsi');
            $table->date('tanggal_rilis');
            $table->integer('jumlah_stok');
            $table->decimal('harga_sewa', 10, 0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaset');
    }
};
