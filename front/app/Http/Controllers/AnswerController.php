<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Http;

class AnswerController extends Controller
{
    public function answers(Request $request) {

        $userLogged = $request->session()->get("user");

        if($userLogged != null){
            if($userLogged->rol != 1){ // User
                return redirect('/'); 
            }
        }else{
            return redirect('/'); 
        }
        

        $answers = Answer::get();


        return view("answerlist", [
            "answers" => $answers,
        ]);
    }
}
