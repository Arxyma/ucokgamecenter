<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_pengembalian` AS select `ucokgamecenter`.`pengembalian`.`id_pengembalian` AS `id_pengembalian`,`ucokgamecenter`.`transaksi`.`id_trx` AS `id_trx`,`ucokgamecenter`.`penyewa`.`nama_penyewa` AS `nama_penyewa`,`ucokgamecenter`.`kaset`.`judul` AS `judul`,`ucokgamecenter`.`transaksi`.`tanggal_pengembalian` AS `tanggal_pengembalian`,`ucokgamecenter`.`pengembalian`.`tanggal_dikembalikan` AS `tanggal_dikembalikan`,`ucokgamecenter`.`pengembalian`.`keterlambatan` AS `keterlambatan` from (((`ucokgamecenter`.`pengembalian` left join `ucokgamecenter`.`transaksi` on((`ucokgamecenter`.`pengembalian`.`id_trx` = `ucokgamecenter`.`transaksi`.`id_trx`))) left join `ucokgamecenter`.`penyewa` on((`ucokgamecenter`.`transaksi`.`id_penyewa` = `ucokgamecenter`.`penyewa`.`id_penyewa`))) left join `ucokgamecenter`.`kaset` on((`ucokgamecenter`.`transaksi`.`id_kaset` = `ucokgamecenter`.`kaset`.`id_kaset`)))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `view_pengembalian`");
    }
};
