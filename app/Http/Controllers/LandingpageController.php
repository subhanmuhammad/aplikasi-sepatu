<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $product = Product::all();
        $baner = banner::all();
        return view('landingpage.home', compact('product', 'baner'));
    }
}
