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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
// Route::get('/surveytest', [FeedbackController::class, 'index']);
// Route::post('/surveytest', [FeedbackController::class, 'store']);

Route::get('/survey', function () {
    return view('survey');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});
// Route::get('show',[QuestionController::class,'getAll']);
Route::get('show',[MastbranchinfoController::class,'getAllBranch']);
// Route::get('show',[ChoiceController::class,'getAllc']);
Route::get('/surveyForm', function () {
    return view('surveyForm');
});
Route::get('/testview', function () {
    return view('testview');
});
Route::get('/submit', [SurveyFormController::class, 'getMet']);
Route::post('/submit',[SurveyFormController::class,'saveInfo'])->name('survey.save');

// Route::get('/survey',[AnswerController::class,'getInfoTorate']);
// Route::post('/survey',[AnswerController::class,'saveInfo']);
// Route::get('/', function () {
//     $sting = 'hey there';
//     $qrcode = Qrcode::genarate($string);
//     return view('qr');
// });

Route::get('/surveyform',[AnswerController::class,'pull']);
Route::post('/surveytest',[AnswerController::class,'getInfoTorate']);

// Route::get('/surveyform',[AnswerController::class,'pull2']);
// Route::post('/surveycoco',[AnswerController::class,'getInfoTorate2']);


//excel export
Route::get('/download',[ExportController::class,'download']);
Route::get('/export',[ExportController::class,'exportReport']);
