<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $baner = banner::all();
        return view('admin.dashboard', compact('baner'));
    }
}
