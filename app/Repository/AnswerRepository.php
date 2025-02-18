<?php
namespace App\Repository;

use App\Http\Controllers\AnswerController;
use App\Models\Answer;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnswerRepository{
    public static function getAll(){
        return Answer::all();
    }

    public static function getAnswerById($IdAnswer){
        return Answer::where('IdAnswer','=',$IdAnswer)->first();
    }
    public static function getAnswerByQuestionSurveyForm($IdQuestion,$IdChoice,$IdSurveyform){
        $answer = Answer::where('answer.IdQuestion','=',$IdQuestion)->where('answer.IdChoice','=',$IdChoice)->where('answer.IdSurveyForm','=',$IdSurveyform);
        return $answer;
    }
    public static function getQuestionWithId($IdQuestion){
        $answer = Answer::where('answer.IdQuestion','=',$IdQuestion);
        return $answer;
    }
    public static function getChoiceEithId($IdChoice){
        $answer = Answer::where('answer.IdChoice','=',$IdChoice);
        return $answer;
    }
    public static function getSurveyFormwithId($IdSurveyForm){
        $answer = Answer::where('answer.IdSurveyForm','=',$IdSurveyForm);
        return $answer;
    }
    public static function saveAnswer($IdQuestion,$IdChoice,$IdSurveyForm){
        $ansobj = new Answer();
        $ansobj->IdQuestion = $IdQuestion;
        $ansobj->Idchoice = $IdChoice;

        $ansobj->IdSurveyform = $IdSurveyForm;
        $ansobj->save();
        return $ansobj->IdAnswer;
    }

}
?>
