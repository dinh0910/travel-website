<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelPage;
use Illuminate\Http\Request;

class HotelPageController extends Controller
{
  public function updateHotelPage(Request $req)
  {
    $tp = HotelPage::find($req->id);
    $tp->content = $req->content;
    $tp->save();

    return redirect()->route('hotel.index');
  }

  public function updateHotelPg(Request $req)
  {
    $tp = HotelPage::find($req->id);
    $tp->content = $req->content;
    $tp->save();

    return redirect()->route('hotelpage.index');
  }

  public function destroy(HotelPage $tp, $id)
  {
    $t = HotelPage::find($id);
    $t->delete();
    return redirect()->route('hotelpage.index');
  }
}
