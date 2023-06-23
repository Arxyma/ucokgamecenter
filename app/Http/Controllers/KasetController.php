<?php

namespace App\Http\Controllers;

use App\Models\Kaset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use App\Exports\KasetExport;
// use Barryvdh\DomPDF\Facade\PDF;
// use Maatwebsite\Excel\Facades\Excel as Excel;

class KasetController extends Controller
{
    public function welcomePage()
    {
        $kaset = DB::table('kaset')->count();
        $penyewa = DB::table('penyewa')->count();
        $transaksi = DB::table('transaksi')->count();
        $pengembalian = DB::table('pengembalian')->count();

        return view('welcome', [
            'kaset' => $kaset,
            'penyewa' => $penyewa,
            'transaksi' => $transaksi,
            'pengembalian' => $pengembalian,
        ]);
    }

    public function Home()
    {
        return view('home');
    }

    public function tampil()
    {
        $data = Kaset::All();
        return view('kaset', ['data' => $data]);
    }

    public function tambah()
    {
        $lastKaset = Kaset::orderBy('id_kaset', 'desc')->first();

        if ($lastKaset) {
            $lastId = substr($lastKaset->id_kaset, 3); // Mengambil angka setelah 'KST'
            $newId = 'KST' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'KST001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('tambah-kaset', ['newId' => $newId]);
    }
    
    public function simpan(request $request)
    {
        $data = array(
            'id_kaset'=>$request->id_kaset,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'tanggal_rilis'=>$request->tanggal_rilis,
            'jumlah_stok'=>$request->jumlah_stok,
            'harga_sewa'=>str_replace('.','',$request->harga_sewa),
        );

        $data = Kaset::create($data);
        if($data) {
            return redirect('/kaset')->with(array('status'=>true, 'Berhasil Tambah Data'));
        } else
            return json_encode(array('status'=>true, 'Gagal Tambah Data'));
    }
    
    public function hapus($id_kaset)
    {
        $data = Kaset::where("id_kaset", $id_kaset)->delete();
        if($data) {
            return redirect('/kaset')->with(array('status'=>true, 'Berhasil Hapus Data'));
        } else
            return json_encode(array('status'=>false, 'Gagal Tambah Data'));
    }
    
    public function ubah($id_kaset)
    {
        $data = Kaset::where("id_kaset", $id_kaset)->get();
        return view('ubah-kaset', ['data'=>$data]);
    }
    
    public function edit(request $request)
    {
        $data = Kaset::where("id_kaset", $request->id_kaset)->update(array(
            'id_kaset'=>$request->id_kaset,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'tanggal_rilis'=>$request->tanggal_rilis,
            'jumlah_stok'=>$request->jumlah_stok,
            'harga_sewa'=>str_replace('.','',$request->harga_sewa),
        ));

        if($data) {
            return redirect('/kaset')->with(array('status'=>true, 'Berhasil Ubah Data'));
        } else
            return json_encode(array('status'=>false, 'Gagal Ubah Data'));
    }

    // public function cetakpdf()
    // {
    //     $data = Kaset::all();
    //     // $pdf = PDF::loadview('pdf',['mhs'=>$mhs]);
    //     $pdf = PDF::loadView('pdf', ['data'=>$data]);
    //     $time = \Carbon\Carbon::now()->toDateTimeString();
    //     return $pdf->stream("LaporanKaset-{$time}.pdf", array('Attachment' => 0));
    // }

    // public function export_excel()
    // {
    //     $time = \Carbon\Carbon::now()->toDateTimeString();
    //     return Excel::download(new KasetExport, "TabelKaset-{$time}.xlsx");
    // }
}
