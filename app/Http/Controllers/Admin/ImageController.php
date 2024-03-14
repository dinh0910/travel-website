<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
  public function index()
  {
    return view('admin.images.upload');
  }

  public function library()
  {
    $images = Image::all();
    return view('admin.images.library', compact('images'));
  }

  public function upload(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
    ]);

    // $fileName = $request->file;
    // $request->file->storeAs('public/images', time() . '.' . $fileName->extension());
    // // $img = Image::create(['path' => time() . '.' . $fileName->extension()]);

    if ($request->hasFile('file')) {
      foreach ($request->file as $value) {
        $fileNames = $value->getClientOriginalName();
        $value->storeAs('public/images', $fileNames);
        Image::create([
          'path' => $fileNames
        ]);
      }
    }
    return redirect()->back()->with('success', 'Image uploaded successfully!');
  }

  public function destroy(Request $req)
  {
    $img = Image::find($req->id);
    $img->delete();
    File::delete( $img->path);
    return redirect()->route('admin.library');
  }
}
