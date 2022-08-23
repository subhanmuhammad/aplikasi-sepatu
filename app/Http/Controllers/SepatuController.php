<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SepatuController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $product = Product::all();
        return view('admin.sepatu', compact('product'));
        dd($product);
    }

    public function autocode($kode)
    {
        $timestamp = time();
        $random = rand(10, 100);
        $current_date = date('mdYs' . $random, $timestamp);
        return $kode . $current_date;
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('gambar')) {
            $db = new Product();
            $id = $this->autocode('PRD');
            $db->id = $id;
            $db->nama_product = $request->nama_product;
            $db->jenis_product = $request->jenis_product;
            $db->harga = $request->harga;
            if ($request->file('gambar')) {
                $files = $request->file('gambar');
                $type = $request->file('gambar')->getClientOriginalExtension();
                $file_upload = $this->autocode('PRD') . date('His') . "." . $type;
                \Storage::disk('public')->put("img/product/$id/" . $file_upload, file_get_contents($files));
                \Storage::disk('public')->put("img/product/$id/gambar/1280x720/" . $file_upload, file_get_contents($files));
                $db->gambar = $file_upload;
                $request->file('gambar')->store('post-image');
            };
        }

        $db->save();

        return redirect('/sepatu')->with('success', 'DATA BERHASIL DI TAMBAH.!');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/sepatu')->withSuccess('DATA BERHASIL DI HAPUS!');
    }
}
