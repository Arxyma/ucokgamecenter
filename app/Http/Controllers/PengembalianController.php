<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Pengembalian;
use App\Models\Transaksi;
use App\Models\View_Pengembalian;
use App\Models\View_Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengembalianController extends Controller
{
    public function welcomePage()
    {
        return view('welcome');
    }

    public function tampil()
    {
        $name = Auth::user()->name;
        
        if (Gate::allows('admin')) {
            $data = View_Pengembalian::All();
        } else {
            $data = View_Pengembalian::where('nama_penyewa', $name)->get();
        }
        return view('pengembalian', ['data' => $data]);
    }

    public function tambah()
    {
        $lastPengembalian = Pengembalian::orderBy('id_pengembalian', 'desc')->first();

        if ($lastPengembalian) {
            $lastId = substr($lastPengembalian->id_pengembalian, 3); // Mengambil angka setelah 'KST'
            $newId = 'PGB' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'PGB001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('tambah-pengembalian', [
            'newId' => $newId,
            'transaksi' => Transaksi::all(),
        ]);
        
    }
    
    public function simpan(request $request)
    {
        $data = array(
            'id_pengembalian'=>$request->id_pengembalian,
            'id_trx'=>$request->id_trx,
            'tanggal_dikembalikan'=>$request->tanggal_dikembalikan,
            'keterlambatan'=>$request->keterlambatan,
        );

        $data = Pengembalian::create($data);
        if($data) {
            return redirect('/pengembalian')->with(array('status'=>true, 'Berhasil Tambah Data'));
        } else
            return json_encode(array('status'=>true, 'Gagal Tambah Data'));
    }
    
    // public function hapus($id_pengembalian)
    // {
    //     $data = Pengembalian::where("id_pengembalian", $id_pengembalian)->delete();
    //     if($data) {
    //         return redirect('/pengembalian')->with(array('status'=>true, 'Berhasil Hapus Data'));
    //     } else
    //         return json_encode(array('status'=>false, 'Gagal Tambah Data'));
    // }
    
    // public function ubah($id_pengembalian)
    // {
    //     $data = Pengembalian::where("id_pengembalian", $id_pengembalian)->get();
    //     return view('ubah-pengembalian', ['data'=>$data]);
    // }
    
    // public function edit(request $request)
    // {
    //     $data = Pengembalian::where("id_pengembalian", $request->id_pengembalian)->update(array(
    //         'id_pengembalian'=>$request->id_pengembalian,
    //         'id_kaset'=>$request->id_kaset,
    //         'nama_penyewa'=>$request->nama_penyewa,
    //         'judul'=>$request->judul,
    //         'keterlambatan'=>$request->keterlambatan,
    //         'tanggal_dikembalikan'=>$request->tanggal_dikembalikan,
    //         'tanggal_pengembalian'=>$request->tanggal_pengembalian,
    //     ));

    //     if($data) {
    //         return redirect('/pengembalian')->with(array('status'=>true, 'Berhasil Ubah Data'));
    //     } else
    //         return json_encode(array('status'=>false, 'Gagal Ubah Data'));
    // }
    
    public function getTransaksiInfo($id_trx)
    {
        $transaksi = View_Transaksi::where('id_trx', $id_trx)->first();

        if ($transaksi) {
            return response()->json([
                'nama_penyewa' => $transaksi->nama_penyewa,
                'judul' => $transaksi->judul,
                'tanggal_pengembalian' => $transaksi->tanggal_pengembalian
            ]);
        } else {
            return response()->json(['error' => 'Transaksi not found'], 404);
        }
    }

}
