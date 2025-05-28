<?php

namespace App\Http\Controllers;

use App\Models\Hima;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        $himas = Hima::with('user')->get();
        
        return view('admin.index', compact('himas'));
    }

    /**
     * Display the specified HIMA.
     */
    public function show(Hima $hima)
    {
        $hima->load('user');
        
        return view('admin.show', compact('hima'));
    }
}
