<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request, $id)
  {
    $this->validate($request,[ 'body'  => 'required' ]);

    return $request->user()->comments()->create([
      'body' => $request->json('body'),
      'tutorial_id'  => $id
    ]);
  }
}
