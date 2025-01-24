<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NoveltyCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoveltyCategoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('Backend.novelty_categories.index');
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
  public function show(NoveltyCategory $noveltyCategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(NoveltyCategory $noveltyCategory)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, NoveltyCategory $noveltyCategory)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(NoveltyCategory $noveltyCategory)
  {
    //
  }
}
