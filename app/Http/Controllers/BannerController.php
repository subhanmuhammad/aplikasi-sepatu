<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $baner = banner::all();
        return view('admin/dashboard', compact('baner'));
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
            $db = new banner();
            $id = $this->autocode('BNR');
            $db->id = $id;
            $db->name = $request->nama_banner;
            // $db->jenis_product = $request->jenis_product;
            // $db->harga = $request->harga;
            if ($request->file('gambar')) {

                $files = $request->file('gambar');
                $type = $request->file('gambar')->getClientOriginalExtension();
                $file_upload = $this->autocode('BNR') . date('His') . "." . $type;
                \Storage::disk('public')->put("img/bannaer/$id/" . $file_upload, file_get_contents($files));
                \Storage::disk('public')->put("img/banner/$id/gambar/1280x720/" . $file_upload, file_get_contents($files));
                $db->gambar = $file_upload;
                $request->file('gambar')->store('post-image');
            };
        }

        $db->save();

        return back()->with('success', 'DATA BERHASIL DI TAMBAH.!');
    }
}
