<?php

namespace App\Http\Controllers;

use App\Http\Requests\uyelikRequest;
use App\Models\Uyelik;
use App\Models\Topic;


class TopicController extends Controller
{
   public function index(){
       return Topic::paginate(5);
   }

    public function subscribe(uyelikRequest $request)
    {
        if ($uyelik = Uyelik::where('topic_id', $request->topic_id)->where('user_id', $request->user()->id)->first()) {
            return $uyelik->delete();
        }
        else {
            return Uyelik::create($request->validated());
        }
    }
}
