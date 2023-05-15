<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    //index
    public function index()
    {
        $pegawai = DB::table('table__t__pegawai')
        ->join('table__t__provinsi', 'table__t__pegawai.provinsi_id', '=', 'table__t__provinsi.id')
        ->join('table__t__kecamatan', 'table__t__pegawai.kecamatan_id', '=', 'table__t__kecamatan.id')
        ->join('table__t__kelurahan', 'table__t__pegawai.kelurahan_id', '=', 'table__t__kelurahan.id')
        ->select('table__t__pegawai.*', 'table__t__provinsi.nama_provinsi', 'table__t__kecamatan.nama_kecamatan', 'table__t__kelurahan.nama_kelurahan')
        ->get();
        return view('pegawai', compact('pegawai'));
    }

    //add
    public function add(Request $request) {
        DB::table('table__t__pegawai')->insert([
            
            'nama_pegawai' => $request->nama_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/pegawai');
    }

    //edit
    public function edit(Request $request, $id) {
        DB::table('table__t__pegawai')->where('id', $id)->update([
            'nama_pegawai' => $request->nama_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'updated_at' => now()
        ]);
        return redirect('/pegawai');
    }

    //delete
    public function delete($id) {
        DB::table('table__t__pegawai')->where('id', $id)->delete();
        return redirect('/pegawai');
    }

}
