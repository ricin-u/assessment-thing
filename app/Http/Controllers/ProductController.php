<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $row = DB::table('products')->leftJoin('tokos', 'products.toko_id', '=', 'tokos.id')->get();
        return view('product.index', compact('row'));
    }

    public function create(){
        $toko = Toko::all();
        return view('product.create', compact('toko'));
    }

    public function show($id){
        $row = DB::table('products')->leftJoin('tokos', 'products.toko_id', '=', 'tokos.id')->where('tokos.id', '=', $id)->get();
        return view('product.index', compact('row'));
    }

    public function store(Request $request){
        $data = $request->all();
        Product::create($data);
        return redirect()->route('product.index');
    }

    public function edit($id){
        $row = Product::find($id);
        $toko = Toko::all();
        return view('product.edit', compact('row', 'toko'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        Product::find($id)->update($data);
        return redirect()->route('product.index');
    }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()->route('product.index');
    }
}
