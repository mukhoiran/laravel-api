<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function create(Request $request)
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
