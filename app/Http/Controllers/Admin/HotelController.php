<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelPage;
use Illuminate\Http\Request;

class HotelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $hotels = Hotel::all();
    $hq = HotelPage::all();
    return view('admin.hotels.index', compact('hotels', 'hq'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $req)
  {
    Hotel::create($req->all());
    return redirect()->route('hotel.index');
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
  public function edit(Hotel $hotel)
  {
    return view('admin.hotels.edit', compact('hotel'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $req, Hotel $hotel)
  {
    $vs = $req->has('view_sea') ? 'on' : '1';
    $r = $req->has('restaurant_coffee') ? 'on' : '1';
    $w = $req->has('wifi') ? 'on' : '1';
    $a = $req->has('air_conditional') ? 'on' : '1';
    // dd($vs);

    $model = Hotel::findOrFail($req->id);
    $model->name = $req->name;
    $model->view_sea = $vs;
    $model->restaurant_coffee = $r;
    $model->wifi = $w;
    $model->air_conditional = $a;
    $model->price = $req->price;
    $model->save();

    return redirect()->route('hotel.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $hotel = Hotel::find($id);
    $hotel->delete();
    return redirect()->route('hotel.index');
  }

  public function hotelPage()
  {
    $hp = HotelPage::all();
    $hotels = Hotel::all();
    return view('admin.hotels.hotelPage', compact('hp', 'hotels'));
  }

  public function createHotelPage(Request $req)
  {
    HotelPage::create($req->all());
    return redirect()->route('hotel.index');
  }
}
