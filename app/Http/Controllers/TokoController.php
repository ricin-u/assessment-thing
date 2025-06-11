<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('toko.index', compact('toko'));
    }
    public function list()
    {
        $toko = Toko::all();
        return view('toko.list', compact('toko'));
    }

    public function create()
    {
        return view('toko.create');
    }

    public function edit($id)
    {
        $toko = Toko::find($id);
        return view('toko.edit', compact('toko'));
    }

    public function store(Request $request){
        $row = new Toko();
        $row->nama_toko = $request->input('nama_toko');
        $row->alamat = $request->input('alamat');
        $row->nomor_telpon = $request->input('nomor_telpon');
        $row->save();
        return redirect()->route('toko.index');
    }

    public function update(Request $request, $id){
        $row = Toko::find($id);
        $row->nama_toko = $request->input('nama_toko');
        $row->alamat = $request->input('alamat');
        $row->nomor_telpon = $request->input('nomor_telpon');
        $row->save();
        return redirect()->route('toko.index');
    }

    public function destroy($id){
        $row = Toko::find($id);
        $row->delete();
        return redirect()->route('toko.index');
    }
}
