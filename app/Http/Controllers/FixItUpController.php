<?php

namespace App\Http\Controllers;

use App\FixItUp;
use Illuminate\Http\Request;
use App\Http\Requests\FixItUpRequest;

class FixItUpController extends Controller
{
  public function store(FixItUpRequest $request)
  {
      $fixItUp = FixItUp::create([
        'jumbled' => $request->jumbled,
        'answer' => $request->answer,
        'explanation' => $request->explanation
      ]);
      return response($fixItUp, 200);
  }

  public function update(FixItUpRequest $request,  $id)
  {
      $fixItUp = FixItUp::find($id);
      $fixItUp->jumbled = $request->jumbled;
      $fixItUp->answer = $request->answer;
      $fixItUp->explanation = $request->explanation;
      $fixItUp->save();
      return response($fixItUp, 200);
  }

  public function destroy($id)
  {
    $fixItUp = FixItUp::find($id);
    $fixItUp->delete();
    return response(['message' => 'Deleted!']);
  }

  public function index()
  {
      return FixItUp::all();
  }
}
