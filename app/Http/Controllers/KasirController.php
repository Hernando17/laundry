<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $this->authorize('kasir');
        return view('kasir.index');
    }
}
