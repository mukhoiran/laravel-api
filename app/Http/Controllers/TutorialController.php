<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
      return Tutorial::all();
    }

    public function show($id)
    {
      $tutorial = Tutorial::find($id);

      if(!$tutorial) return response()->json(['error' => 'id not found'],404);

      return $tutorial;
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'body'  => 'required'
      ]);

      $tutorial = $request->user()->tutorials()->create([
        'title' => $request->json('title'),
        'slug'  => str_slug($request->json('title')),
        'body'  => $request->json('body'),
      ]);

      return $tutorial;
    }
}
