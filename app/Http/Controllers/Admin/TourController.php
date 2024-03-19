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
    $tp = TourPage::all();
    return view('admin.tours.index', compact('tours', 'places', 'tp'));

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
    $places = [];
    for ($i = 0; $i < count($req->place); $i++) {
      $places['key' . $i] = $req->place[$i];
    }

    $journey = ['day' => $req->journey_day, 'night' => $req->journey_night];

    $special = ['color' => '', 'status' => ''];

    $requestData = [
      'name' => $req->name,
      'place' => $places,
      'journey' => $journey,
      'departure' => $req->departure,
      'vehicle' => $req->vehicle,
      'price' => $req->price,
      'sale' => $req->sale,
      'sale_price' => $req->sale_price,
      'special' => $special
    ];

    Tour::create($requestData);

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
    if ($req->place != null) {
      $places = [];
      for ($i = 0; $i < count($req->place); $i++) {
        $places['key' . $i] = $req->place[$i];
      }
    }

    $journey = ['day' => $req->journey_day, 'night' => $req->journey_night];
    if ($req->status) {
      $color = str_replace("#", '', $req->color);
      $special = ['color' => $color, 'status' => $req->status];
    }

    $tour = Tour::find($tour->id);

    $tour->name = $req->name;
    if ($req->place != null) {
      $tour->place = $places;
    }
    $tour->journey = $journey;
    $tour->departure = $req->departure;
    $tour->vehicle = $req->vehicle;
    $tour->price = $req->price;
    $tour->sale = $req->sale;
    $tour->sale_price = $req->sale_price;
    if ($req->status) {
      $tour->special = $special;
    }
    $tour->save();
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
