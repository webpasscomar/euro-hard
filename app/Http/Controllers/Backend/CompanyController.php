<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('backend.company.index');
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
  public function show(Company $company)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Company $company)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Company $company)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Company $company)
  {
    //
  }
}
