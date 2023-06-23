<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Transaksi;
use App\Models\View_Transaksi;
use App\Models\Penyewa;
use App\Models\Kaset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function welcomePage()
    {
        return view('welcome');
    }

    public function tampil()
    {
        $name = Auth::user()->name;

        if (Gate::allows('admin')) {
            $data = View_Transaksi::All();
        } else {
            $data = View_Transaksi::where('nama_penyewa', $name)->get();
        }
        return view('transaksi', ['data' => $data]);
    }

    public function tambah()
    {
        $lastTransaksi = Transaksi::orderBy('id_trx', 'desc')->first();

        if ($lastTransaksi) {
            $lastId = substr($lastTransaksi->id_trx, 3); // Mengambil angka setelah 'KST'
            $newId = 'TRX' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'TRX001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('tambah-transaksi', [
            'newId' => $newId,
            'penyewa' => Penyewa::all(),
            'kaset' => Kaset::all(),
        ]);
        
    }
    
    public function simpan(request $request)
    {
        $data = array(
            'id_trx'=>$request->id_trx,
            'id_kaset'=>$request->id_kaset,
            'id_penyewa'=>$request->id_penyewa,
            'jumlah_sewa'=>$request->jumlah_sewa,
            'total_harga'=>$request->total_harga,
            'tanggal_penyewaan'=>$request->tanggal_penyewaan,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
        );

        $data = Transaksi::create($data);
        if($data) {
            return redirect('/transaksi')->with(array('status'=>true, 'Berhasil Tambah Data'));
        } else
            return json_encode(array('status'=>true, 'Gagal Tambah Data'));
    }
    
    // public function hapus($id_trx)
    // {
    //     $data = Transaksi::where("id_trx", $id_trx)->delete();
    //     if($data) {
    //         return redirect('/transaksi')->with(array('status'=>true, 'Berhasil Hapus Data'));
    //     } else
    //         return json_encode(array('status'=>false, 'Gagal Tambah Data'));
    // }
    
    // public function ubah($id_trx)
    // {
    //     $data = Transaksi::where("id_trx", $id_trx)->get();
    //     return view('ubah-transaksi', ['data'=>$data]);
    // }
    
    // public function edit(request $request)
    // {
    //     $data = Transaksi::where("id_trx", $request->id_trx)->update(array(
    //         'id_trx'=>$request->id_trx,
    //         'id_kaset'=>$request->id_kaset,
    //         'id_penyewa'=>$request->id_penyewa,
    //         'jumlah_sewa'=>$request->jumlah_sewa,
    //         'total_harga'=>$request->total_harga,
    //         'tanggal_penyewaan'=>$request->tanggal_penyewaan,
    //         'tanggal_pengembalian'=>$request->tanggal_pengembalian,
    //     ));

    //     if($data) {
    //         return redirect('/transaksi')->with(array('status'=>true, 'Berhasil Ubah Data'));
    //     } else
    //         return json_encode(array('status'=>false, 'Gagal Ubah Data'));
    // }
    
    public function getPenyewaInfo($id_penyewa)
    {
        $penyewa = Penyewa::where('id_penyewa', $id_penyewa)->first();

        if ($penyewa) {
            return response()->json([
                'nama_penyewa' => $penyewa->nama_penyewa,
                'no_hp' => $penyewa->no_hp
            ]);
        } else {
            return response()->json(['error' => 'Penyewa not found'], 404);
        }
    }

    public function getKasetInfo($id_kaset)
    {
        $kaset = Kaset::where('id_kaset', $id_kaset)->first();

        if ($kaset) {
            return response()->json([
                'judul' => $kaset->judul,
                'harga_sewa' => $kaset->harga_sewa
            ]);
        } else {
            return response()->json(['error' => 'Kaset not found'], 404);
        }
    }
}
