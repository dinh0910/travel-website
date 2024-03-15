<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPage;
use Illuminate\Http\Request;

class TourPageController extends Controller
{
  public function updateTourPage(Request $req)
  {
    $tp = TourPage::find($req->id);
    $tp->title = $req->title;
    $tp->description = $req->description;
    $tp->content = $req->content;
    $tp->save();

    return redirect()->route('tour.index');
  }

  public function updateTourPg(Request $req)
  {
    $tp = TourPage::find($req->id);
    $tp->title = $req->title;
    $tp->description = $req->description;
    $tp->content = $req->content;
    $tp->save();

    return redirect()->route('tour.tourpage');
  }

  public function destroy(TourPage $tp, $id)
  {
    $t = TourPage::find($id);
    $t->delete();
    return redirect()->route('tour.tourpage');
  }
}
