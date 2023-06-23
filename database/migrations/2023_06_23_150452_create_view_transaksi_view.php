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
        DB::statement("CREATE VIEW `view_transaksi` AS select `ucokgamecenter`.`transaksi`.`id_trx` AS `id_trx`,`ucokgamecenter`.`penyewa`.`nama_penyewa` AS `nama_penyewa`,`ucokgamecenter`.`penyewa`.`no_hp` AS `no_hp`,`ucokgamecenter`.`kaset`.`judul` AS `judul`,`ucokgamecenter`.`transaksi`.`jumlah_sewa` AS `jumlah_sewa`,`ucokgamecenter`.`kaset`.`harga_sewa` AS `harga_sewa`,`ucokgamecenter`.`transaksi`.`total_harga` AS `total_harga`,`ucokgamecenter`.`transaksi`.`tanggal_penyewaan` AS `tanggal_penyewaan`,`ucokgamecenter`.`transaksi`.`tanggal_pengembalian` AS `tanggal_pengembalian` from ((`ucokgamecenter`.`transaksi` left join `ucokgamecenter`.`penyewa` on((`ucokgamecenter`.`transaksi`.`id_penyewa` = `ucokgamecenter`.`penyewa`.`id_penyewa`))) left join `ucokgamecenter`.`kaset` on((`ucokgamecenter`.`transaksi`.`id_kaset` = `ucokgamecenter`.`kaset`.`id_kaset`)))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `view_transaksi`");
    }
};
