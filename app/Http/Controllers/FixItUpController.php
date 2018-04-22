<?php

namespace App\Http\Controllers;

use App\FixItUp;
use Illuminate\Http\Request;
use App\Http\Requests\FixItUpRequest;

class FixItUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FixItUp::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FixItUpRequest $request)
    {
        $fixItUp = FixItUp::create([
          'jumbled' => $request->jumbled,
          'answer' => $request->answer,
          'explanation' => $request->explanation
        ]);
        return response($fixItUp, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FixItUp  $fixItUp
     * @return \Illuminate\Http\Response
     */
    public function show(FixItUp $fixItUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FixItUp  $fixItUp
     * @return \Illuminate\Http\Response
     */
    public function edit(FixItUp $fixItUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FixItUp  $fixItUp
     * @return \Illuminate\Http\Response
     */
    public function update(FixItUpRequest $request, FixItUp $fixItUp)
    {
        $fixItUp->find($request->id);
        $fixItUp->jumbled = $request->jumbled;
        $fixItUp->answer = $request->answer;
        $fixItUp->explanation = $request->explanation;
        $fixItUp->save();
        return response($fixItUp, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FixItUp  $fixItUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(FixItUp $fixItUp, Request $request)
    {
      $fixItUp->find($request->id);
      $fixItUp->delete();
      return response(['message' => 'Deleted!'], 200);
    }
}
