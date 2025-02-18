<?php

namespace App\Http\Controllers;

use App\Models\Surveyform;
use App\Repository\ChoiceRepository;
use App\Repository\QuestionRepository;
use App\Repository\SurveyformRepository;
use Illuminate\Http\Request;

class SurveyFormController extends Controller
{

public static function saveform(Request $request) {
    $date = $request->date;
    $name = $request->name;
    $phone = $request->phone;
    $email = $request->email;
    $comment = $request->comment;
    
    SurveyformRepository::Info($date,$name,$email,$comment,$phone);

  
}
public static function getQuestion($IdQuestion){
    $question = QuestionRepository::getQuestionId($IdQuestion);
    return view('surveyForm',compact('question'));
}
public static function getChoice($IdChoice){
    $choice = ChoiceRepository::getChoiceById($IdChoice);
    return view('SurveyForm',compact('choice'));
}

public static function getInfo($date,$name,$email,$comment,$phone){
    $data = SurveyformRepository::Info($date,$name,$email,$comment,$phone);
      return $data;
  }
//   public static function saveInfo(Request $request){
//    $name = $request->name;
//    $date = $request->date;
//    $email = $request->email;
//    $phone = $request->phone;
//    $comment = $request->comment;
//    SurveyformRepository::Info($name,$date,$email,$phone,$comment);
//    return redirect()->back()->with('sucees','Survey submit');
//   }
public function getMet()
{
    return view('submit');
}
public function saveInfo(Request $request)
{
    // Validate Input
    $request->validate([
    
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'comment' => 'nullable|string',
    ]);

    // Call repository method to save data
    SurveyformRepository::Info(
        
        $request->name,
        $request->email,
        $request->comment,
        $request->phone,
        $request->branch
        
    );

    // Redirect back with success message
    return redirect()->back()->with('success', 'Survey submitted successfully!');
}
}
