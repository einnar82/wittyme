<?php

namespace App\Http\Controllers;

use App\Photoword;
use Illuminate\Http\Request;
use App\Http\Requests\PhotowordQuestionRequest;
use Carbon\Carbon;

class PhotowordController extends Controller
{
    public function add(PhotowordQuestionRequest $request)
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

    public function get()
    {
      return Photoword::all();
    }

    public function delete($id)
    {
      $photoword = Photoword::find($id);
      $photoword->delete();
      return response(['message' => 'Deleted!'], 200);
    }

    public function update(PhotowordQuestionRequest $request, $id)
    {
        $photoword = Photoword::find($id);
        $image = $request->file('image_question');
        $fileName = Carbon::now('Asia/Shanghai')->format('y-m-d').md5(Carbon::now('Asia/Shanghai')->format('HH:mm')).$image->getClientOriginalName();
        $photoword->image_question = $fileName;
        $photoword->choice1 = $request->choice1;
        $photoword->choice2 = $request->choice2;
        $photoword->choice3 = $request->choice3;
        $photoword->answer = $request->answer;
        $photoword->save();
        $image->move(storage_path().'/app/public/photoword', $fileName); 
        return response($photoword, 200);
    }

    public function getTenQuestions()
    {
      return Photoword::paginate(10);
    }
}
