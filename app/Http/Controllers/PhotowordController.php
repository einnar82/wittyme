<?php

namespace App\Http\Controllers;

use App\Photoword;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PhotowordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Photoword::all();
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
    public function store(Request $request)
    {
        $image = $request->file('image_question');
        $fileName = Carbon::now('Asia/Shanghai')->format('y-m-d').md5(Carbon::now('Asia/Shanghai')->format('HH:mm')).$image->getClientOriginalName();
        $photoword = Photoword::create([
          'image_question' => $fileName,
          'choice1' => $request->choice1,
          'choice2' => $request->choice2,
          'choice3' => $request->choice3,
          'answer' => $request->answer
        ]);
        $image->move(storage_path().'/app/public/photoword', $fileName);  
        return response($photoword, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photoword  $photoword
     * @return \Illuminate\Http\Response
     */
    public function show(Photoword $photoword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photoword  $photoword
     * @return \Illuminate\Http\Response
     */
    public function edit(Photoword $photoword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photoword  $photoword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photoword $photoword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photoword  $photoword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photoword $photoword)
    {
        //
    }
}
