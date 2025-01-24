<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructivosController extends Controller
{
    public function index()
    {
        return view('instructivos');
    }
}
