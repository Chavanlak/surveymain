<?php
namespace App\Repository;

use App\Models\Surveyform;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SurveyformRepository{
   public static function getIdSurveyform($IdSurvey){
    return Surveyform::where('IdSurvey','=',$IdSurvey);
   }
   public static function getAllSurveyForm(){
    return Surveyform::all();
   }

   public static function Info($name,$email,$comment,$phone,$branch){


        $data = new Surveyform();
        // $data->date = $date;
        $data->name = $name;
        $data->phone = $phone;
        $data->email = $email;
        $data->comment = $comment;

        $data->branch = $branch;


        $data->save();
        return $data->IdSurvey;
   }
   public static function addInfo($date,$name,$email,$comment,$phone,$IdQuestion,$IdAnswer){

   }

}
?>
