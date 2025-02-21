<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MastbranchinfoController;
use App\Http\Controllers\SurveyFormController;
use SimpleSoftwareIO\Qrcode\Facades\Qrcode;

Route::get('/',[AnswerController::class,'pull']);
Route::post('/surveytest',[AnswerController::class,'getInfoTorate']);

Route::get('/thankyou', function () {
    return view('thankyou');
});


// Route::get('/surveyform',[AnswerController::class,'pull']);
// Route::post('/surveytest',[AnswerController::class,'getInfoTorate']);


//excel export
Route::get('/download',[ExportController::class,'download']);
Route::get('/export',[ExportController::class,'exportReport']);
