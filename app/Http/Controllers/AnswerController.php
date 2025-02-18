<?php

namespace App\Http\Controllers;

use App\Repository\AnswerRepository;
use App\Repository\ChoiceRepository;
use App\Repository\MastbranchinfoRepository;
use App\Repository\QuestionRepository;
use App\Repository\SurveyformRepository;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // public static function getIdQuesion($IdQuestion){
    //     $getq = QuestionRepository::getQuestionId($IdQuestion);
    //     return $getq;
    // }
    // public static function getIdChoice($Idchoice){
    //     $getch = ChoiceRepository::getChoiceById($Idchoice);
    //     return $getch;
    // }
    // public static function getIdSurvey($IdSurveyform){
    //     $getsur = SurveyformRepository::getIdSurveyform($IdSurveyform);
    //     return $getsur;
    // }
    public static function getQuestionId(Request $request){
        $question = QuestionRepository::getQuestionId($request->IdQuestion);
        return view('survey',compact('question'));
    }
    // public static function getChoiceInAnswer(){
    //     $answerList =
    // }
    public static function getAnswer($IdQuestion,$Idchoice,$IdSurveyForm){
        $question = QuestionRepository::getQuestionId($IdQuestion);
        $choice = ChoiceRepository::getChoiceById($Idchoice);
        // $surveyform = SurveyformRepository::getAllSurveyForm($IdSurveyForm);
        $surveyform = SurveyformRepository::getIdSurveyform($IdSurveyForm);
        return view('survey',compact('question','choice','surveyform'));

    }
    public static function getAnswer2($IdQuestion,$Idchoice,$IdSurveyForm){
        $question = QuestionRepository::getQuestionId($IdQuestion);
        $choice = ChoiceRepository::getChoiceById($Idchoice);
        // $surveyform = SurveyformRepository::getAllSurveyForm($IdSurveyForm);
        $surveyform = SurveyformRepository::getIdSurveyform($IdSurveyForm);
        return view('survey',compact('question','choice','surveyform'));

    }
    public static function addInfo(Request $request){
        $date = $request->date;
        $name = $request->name;
        $email = $request->email;
        $comment = $request->comment;
        $phone = $request->phone;
        SurveyformRepository::Info($date,$name,$email,$comment,$phone);
        // $IdQuestion = $request->IdQuestion;
        // QuestionRepository::getQuestionId($IdQuestion);
        return view('survey');

    }
    public static function pull(){
        $branch = MastbranchinfoRepository::selectbranch();
        return view('surveytest',compact('branch'));
    }

    public static function pull2(){
        $branch = MastbranchinfoRepository::selectbranch();
        return view('surveycoco',compact('branch'));
    }
    public static function getInfoTorate(Request $request){
        // $branch = $request->branches;
        $branch = $request->branches; //มาจาก view
        // $branch = $request->b1;
        // $branch = $request->b2;
        // $branch = $request->b3;
        $name = $request->name;
        $email = $request->email;
        $comment = $request->comment;
        $phone = $request->phone;

        $ques1 = $request->ques1;
        $ch1 = $request->ch1;

        $ques2 = $request->ques2;
        $ch2 = $request->ch2;

        $ques3 = $request->ques3;
        $ch3 = $request->ch3;

        $ques4 = $request->ques4;
        $ch4 = $request->ch4;
        // MastbranchinfoRepository::selectbranch($branches);

        // MastbranchinfoRepository::selectbranch($branch);

        $IdSurveyForm = SurveyformRepository::Info($name,$email,$comment,$phone,$branch);//save branch ใน info

        // $IdSurveyForm = SurveyformRepository::Info($name,$email,$comment,$phone);

        // echo('surveyform Id is'." ".$IdSurveyForm);
        AnswerRepository::saveAnswer($ques1,$ch1,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques2,$ch2,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques3,$ch3,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques4,$ch4,$IdSurveyForm);



        // echo($name);
        // echo($email);
        // echo($comment);
        // echo($phone);
        // echo($ques1." ".$ch1);
        // echo($ques2." ".$ch2);
        // echo($ques3." ".$ch3);
        // echo($ques4." ".$ch4);
        // SurveyformRepository::Info($name,$email,$comment,$phone);
        // $question = $request->question;
        // QuestionRepository::getQuestionId($question);
        // $choice = $request->choice;
        // $Idchoice = $request->Idchoice;
        // ChoiceRepository::getallchoice($choice,$Idchoice);
        // // return view('surveytest');
        // // return redirect()->back()->with('success', 'Survey submitted successfully!');
        return redirect('/thankyou');
    }

    // public static function getlocation(Request $request){
    //     $k = MastbranchinfoRepository::getlocation($request->location);
    //     return view('surveyform',compact('k'));
    // }

    public static function getInfoTorate2(Request $request){
        // $branch = $request->branches;
        $branch = $request->branches2; //มาจาก view
        // $branch = $request->b1;
        // $branch = $request->b2;
        // $branch = $request->b3;
        $name = $request->name;
        $email = $request->email;
        $comment = $request->comment;
        $phone = $request->phone;

        $ques1 = $request->ques1;
        $ch1 = $request->ch1;

        $ques2 = $request->ques2;
        $ch2 = $request->ch2;

        $ques3 = $request->ques3;
        $ch3 = $request->ch3;

        $ques4 = $request->ques4;
        $ch4 = $request->ch4;
        // MastbranchinfoRepository::selectbranch($branches);

        // MastbranchinfoRepository::selectbranch($branch);

        $IdSurveyForm = SurveyformRepository::Info($name,$email,$comment,$phone,$branch);//save branch ใน info

        // $IdSurveyForm = SurveyformRepository::Info($name,$email,$comment,$phone);

        // echo('surveyform Id is'." ".$IdSurveyForm);
        AnswerRepository::saveAnswer($ques1,$ch1,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques2,$ch2,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques3,$ch3,$IdSurveyForm);
        AnswerRepository::saveAnswer($ques4,$ch4,$IdSurveyForm);
        return redirect('/thankyou2');
    }
}
