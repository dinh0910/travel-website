<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use App\Models\Place;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tours = Tour::all();
    $places = Place::all();
    $journeys = Journey::all();
    return view('admin.tours.index', compact('tours', 'places', 'journeys'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $places = Place::all();
    $journeys = Journey::all();
    return view('admin.tours.add', compact('places', 'journeys'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $req)
  {
    Tour::create($req->all());
    return redirect()->route('tour.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Tour $tour)
  {
    $places = Place::all();
    $journeys = Journey::all();
    return view('admin.tours.edit', compact('tour', 'places', 'journeys'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $req, Tour $tour)
  {
    $tour->update($req->all());
    return redirect()->route('tour.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tour $tour)
  {
    $tour->delete();
    return redirect()->route('tour.index');
  }
}
