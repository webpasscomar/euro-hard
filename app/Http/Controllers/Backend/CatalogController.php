<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $catalog = Catalog::first();
    return view('backend.catalogs.index', compact('catalog'));
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
  public function show(Catalog $catalog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Catalog $catalog): View
  {
    return view('backend.catalogs.edit', compact('catalog'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Catalog $catalog)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Catalog $catalog)
  {
    //
  }
}
