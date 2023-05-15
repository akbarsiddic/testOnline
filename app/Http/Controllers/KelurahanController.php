<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelurahan;


class KelurahanController extends Controller
{
    //all
    public function index()
    {
        $kelurahan = DB::table('table__t__kelurahan')
        ->join('table__t__kecamatan', 'table__t__kelurahan.kecamatan_id', '=', 'table__t__kecamatan.id')
        ->select('table__t__kelurahan.*', 'table__t__kecamatan.nama_kecamatan')
        ->get();

        $kecamatan = DB::table('table__t__kecamatan')->get();

        return view('kelurahan', compact('kelurahan', 'kecamatan'));

    }

    //add
    public function add(Request $request) {
        DB::table('table__t__kelurahan')->insert([
            'kode'=> $request->kode,
            'nama_kelurahan' => $request->nama_kelurahan,
            'kecamatan_id' => $request->kecamatan_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/kelurahan');
    }

    //edit
    public function edit(Request $request, $id) {
        DB::table('table__t__kelurahan')->where('id', $id)->update([
            'kode'=> $request->kode,
            'nama_kelurahan' => $request->nama_kelurahan,
            'kecamatan_id' => $request->kecamatan_id,
            'updated_at' => now()
        ]);
        return redirect('/kelurahan');
    }

    //delete
    public function delete($id) {
        DB::table('table__t__kelurahan')->where('id', $id)->delete();
        return redirect('/kelurahan');
    }
}
