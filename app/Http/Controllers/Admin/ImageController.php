<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

  public function update(Request $req, $id)
  {
    $req->validate([
      'file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
    ]);
    if ($req->hasFile('file')) {
      $fileName = $req->file->getClientOriginalName();
      $req->file->storeAs('public/images', $fileName);
      $img = Image::find($id);
      $img->path = $fileName;
      $img->save();
    }
    return redirect()->back();
  }

  public function destroy(Request $req)
  {
    $img = Image::find($req->id);
    $name = $img->path;
    Storage::delete('public/images/' . $name);
    $img->delete();

    return redirect()->route('admin.library');
  }
}
