<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Novelty;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoveltyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('Backend.novelties.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Novelty $novelty)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Novelty $novelty)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Novelty $novelty)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Novelty $novelty)
  {
    //
  }
}
