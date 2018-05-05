<?php

namespace App\Http\Controllers;

use App\Nymrush;
use Illuminate\Http\Request;
use App\Http\Requests\NymrushRequest;

class NymrushController extends Controller
{
    public function index()
    {
        return Nymrush::all();
    }

    public function store(NymrushRequest $request)
    {
        $nymrush = Nymrush::create([
          'synonym' => $request->synonym,
          'choice1' => $request->choice1,
          'choice2' => $request->choice2,
          'choice3' => $request->choice3,
          'answer' => $request->answer,
        ]);
        return response($nymrush, 200);
    }

    public function update(NymrushRequest $request, Nymrush $nymrush)
    {
        $nymrush->find($request->id);
        $nymrush->synonym = $request->synonym;
        $nymrush->choice1 = $request->choice1;
        $nymrush->choice2 = $request->choice2;
        $nymrush->choice3 = $request->choice3;
        $nymrush->answer = $request->answer;
        $nymrush->save();
        return response($nymrush, 200);
    }

    public function destroy(Nymrush $nymrush, Request $request)
    {
        $nymrush->find($request->id);
        $nymrush->delete();
        return response(['message' => 'Deleted!']);
    }
}
