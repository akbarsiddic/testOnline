<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    #all
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan', compact('kecamatan'));
    }

    #add
    public function add(Request $request) {
        DB::table('table__t__kecamatan')->insert([
            'kode'=> $request->kode,
            'nama_kecamatan' => $request->nama_kecamatan,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/kecamatan');
    }

    #edit
    public function edit(Request $request, $id) {
        DB::table('table__t__kecamatan')->where('id', $id)->update([
            'kode'=> $request->kode,
            'nama_kecamatan' => $request->nama_kecamatan,
            'updated_at' => now()
        ]);
        return redirect('/kecamatan');
    }

    #delete
    public function delete($id) {
        DB::table('table__t__kecamatan')->where('id', $id)->delete();
        return redirect('/kecamatan');
    }
}
