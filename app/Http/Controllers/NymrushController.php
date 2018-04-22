<?php

namespace App\Http\Controllers;

use App\Nymrush;
use Illuminate\Http\Request;
use App\Http\Requests\NymrushRequest;

class NymrushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nymrush::all();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Nymrush  $nymrush
     * @return \Illuminate\Http\Response
     */
    public function show(Nymrush $nymrush)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nymrush  $nymrush
     * @return \Illuminate\Http\Response
     */
    public function edit(Nymrush $nymrush)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nymrush  $nymrush
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nymrush  $nymrush
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nymrush $nymrush)
    {
        $nymrush->find($request->id);
        $nymrush->delete();
        return response(['message' => 'Deleted!']);
    }
}
