<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    public function index()
    {
        return view('formularios');
    }

    public function experiencia()
    {
        return view('formulario-experiencia');
    }

    public function distribuidores()
    {
        return view('formulario-distribuidores');
    }

    public function productos()
    {
        return view('formulario-productos');
    }
}
