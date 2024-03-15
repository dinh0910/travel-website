<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Tour;
use App\Models\TourPage;
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
    $tq = TourPage::all();
    return view('admin.tours.index', compact('tours', 'places', 'tq'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $places = Place::all();
    return view('admin.tours.add', compact('places'));
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
    return view('admin.tours.edit', compact('tour', 'places'));
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

  public function tourPage()
  {
    $tp = TourPage::all();
    $tours = Tour::all();
    return view('admin.tours.tourPage', compact('tp', 'tours'));
  }

  public function createTourPage(Request $req)
  {
    TourPage::create($req->all());
    return redirect()->route('tour.index');
  }
}
