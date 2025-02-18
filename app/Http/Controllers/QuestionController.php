<?php

namespace App\Http\Controllers;
use App\Repository\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public static function getAll(){
        $data = QuestionRepository::getAll();
        return view('show',['data'=>$data]);
      
    }
    public static function showQuestion(){
        return view('Showsurvey');
    }
    
   
    
}
