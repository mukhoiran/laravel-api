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
        'title' => 'required', 'body'  => 'required'
      ]);

      $tutorial = $request->user()->tutorials()->create([
        'title' => $request->json('title'),
        'slug'  => str_slug($request->json('title')),
        'body'  => $request->json('body'),
      ]);

      return $tutorial;
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'title' => 'required', 'body'  => 'required'
      ]);

      $tut = Tutorial::find($id);

      //verify ownership
      if($request->user()->id != $tut->user_id){
        return response()->json(['error' => 'you dont have access to this tutorial'],403);
      }

      $tut->title = $request->title;
      $tut->slug = str_slug($request->title);
      $tut->body = $request->body;
      $tut->save();

      return $tut;
    }

    public function destroy(Request $request, $id)
    {
      $tut = Tutorial::find($id);

      //verify ownership
      if($request->user()->id != $tut->user_id){
        return response()->json(['error' => 'you dont have access to this tutorial'],403);
      }

      $tut->delete();

      return response()->json([
        'success' => true,
        'message' => 'delete successfully'
      ], 200);
    }

}
