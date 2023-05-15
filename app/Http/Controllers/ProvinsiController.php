<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    #all
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi', compact('provinsi'));
    }

    #add
    public function add(Request $request) {
        DB::table('table__t__provinsi')->insert([
            'kode'=> $request->kode,
            'nama_provinsi' => $request->nama_provinsi,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/provinsi');
    }

    #edit
    public function edit(Request $request, $id) {
        DB::table('table__t__provinsi')->where('id', $id)->update([
            'kode'=> $request->kode,
            'nama_provinsi' => $request->nama_provinsi,
            'updated_at' => now()
        ]);
        return redirect('/provinsi');
    }

    #delete
    public function delete($id) {
        DB::table('table__t__provinsi')->where('id', $id)->delete();
        return redirect('/provinsi');
    }
}
