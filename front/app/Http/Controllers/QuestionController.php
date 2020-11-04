<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

class QuestionController extends Controller
{

    public function doQuestion(Request $request)
    {

        $userLogged = $request->session()->get("user");
        $isQuestioning = false;
        $answer = "";
        $question = array("question_type" => "yes-no", "question" => "Pregunta", "id" => 0);

        if ($userLogged != null) {
            if ($userLogged->rol != 2) { // User
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

        $validation = $request->validate([
            'answer'    => 'required',
            'question_id'    => 'required',
        ]);

        if ($validation["answer"] && $validation["question_id"]) {
            $answer = $validation["answer"];
            $question = Question::find($validation["question_id"]);
            $nDate = date_create()->format("Y-m-d");

            $nAnswer = Answer::insert(
                ['answer_date' => $nDate, 'user_id' => $userLogged["id"], "question_id" => $validation["question_id"], "answer" => $answer]
            );
            User::where("id", $userLogged["id"])->update(["lastAnswer" => $nDate]);
            $userLogged->lastAnswer = $nDate;
            $request->session()->forget('user');
            $request->session()->put('user', $userLogged);

            $restResponse = Http::put('http://127.0.0.1:3000/api/answer',[
                "question" => $question->question,
                "answer" => $answer,
                "userId" => $userLogged->id
            ]);

        } else {
            return redirect("/question");
        }

        return view("question", [
            "isQuestioning" => $isQuestioning,
            "question_id" => $question['id'],
            "questionType" => $question['question_type'],
            "question" => $question['question'],
            "answer" => $answer
        ]);
    }


    public function question(Request $request)
    {

        $userLogged = $request->session()->get("user");
        $isQuestioning = false;
        $answer = "";
        $question = array("question_type" => "yes-no", "question" => "Pregunta", "id" => 0);

        
        if ($userLogged != null) {
            if ($userLogged->rol != 2) { // User
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

        $date1 = $userLogged->lastAnswer;
        $date2 = date_create()->format("Y-m-d");

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        if ($diff < 0 || $userLogged->lastAnswer == NULL) {
            $question = Question::inRandomOrder()->first();
            $answer = "";
            $isQuestioning = true;
        }else{
            $answerModel = Answer::where(["user_id" => $userLogged->id])->orderBy('answer_date',"desc")->first();
            $question = $answerModel->question;
            $answer = $answerModel->answer;
        }

        return view("question", [
            "isQuestioning" => $isQuestioning,
            "question_id" => $question['id'],
            "questionType" => $question['question_type'],
            "question" => $question['question'],
            "answer" => $answer
        ]);
    }
}
