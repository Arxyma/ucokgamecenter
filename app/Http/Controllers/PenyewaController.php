<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenyewaController extends Controller
{
    public function welcomePage()
    {
        return view('welcome');
    }

    public function tampil()
    {
        $data = Penyewa::All();
        return view('penyewa', ['data' => $data]);
    }

    public function tambah()
    {
        $lastPenyewa = Penyewa::orderBy('id_penyewa', 'desc')->first();

        if ($lastPenyewa) {
            $lastId = substr($lastPenyewa->id_penyewa, 3); // Mengambil angka setelah 'KST'
            $newId = 'PYW' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'PYW001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('tambah-penyewa', ['newId' => $newId]);
    }
    
    public function simpan(request $request)
    {
        $data = array(
            'id_penyewa'=>$request->id_penyewa,
            'nama_penyewa'=>$request->nama_penyewa,
            'no_ktp'=>$request->no_ktp,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        );

        $data = Penyewa::create($data);
        if($data) {
            return redirect('/penyewa')->with(array('status'=>true, 'Berhasil Tambah Data'));
        } else
            return json_encode(array('status'=>true, 'Gagal Tambah Data'));
    }
    
    public function hapus($id_penyewa)
    {
        $data = Penyewa::where("id_penyewa", $id_penyewa)->delete();
        if($data) {
            return redirect('/penyewa')->with(array('status'=>true, 'Berhasil Hapus Data'));
        } else
            return json_encode(array('status'=>false, 'Gagal Tambah Data'));
    }
    
    public function ubah($id_penyewa)
    {
        $data = Penyewa::where("id_penyewa", $id_penyewa)->get();
        return view('ubah-penyewa', ['data'=>$data]);
    }
    
    public function edit(request $request)
    {
        $data = Penyewa::where("id_penyewa", $request->id_penyewa)->update(array(
            'id_penyewa'=>$request->id_penyewa,
            'nama_penyewa'=>$request->nama_penyewa,
            'no_ktp'=>$request->no_ktp,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        ));

        if($data) {
            return redirect('/penyewa')->with(array('status'=>true, 'Berhasil Ubah Data'));
        } else
            return json_encode(array('status'=>false, 'Gagal Ubah Data'));
    }
}
