<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriberController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('backend.subscribers.index');
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
  public function show(Subscriber $subscriber)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Subscriber $subscriber)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Subscriber $subscriber)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Subscriber $subscriber)
  {
    //
  }
}
