<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    public function index()
    {
        return view('formularios');
    }
}
