<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  public function index(): View
  {
    return view('Backend.dashboard');
  }
}
