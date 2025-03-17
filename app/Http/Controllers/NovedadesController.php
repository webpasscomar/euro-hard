<?php

namespace App\Http\Controllers;

use App\Models\Novelty;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NovedadesController extends Controller
{
  public function index(): View
  {
    $novedades = Novelty::latest('created_at')->where('status', 1)->get();
    return view('novedades', compact('novedades'));
  }
}
