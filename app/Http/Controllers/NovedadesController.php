<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    public function index()
    {
        return view('novedades');
    }
}
