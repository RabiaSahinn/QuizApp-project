<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('sınav/detay/{slug}', [App\Http\Controllers\HomeController::class, 'quiz_detail'])->name('quizDetail');
Route::get("sınav/{slug}", [App\Http\Controllers\HomeController::class, 'quiz'])->name("quizJoin");
Route::post("sınav/{slug}/sonuc", [App\Http\Controllers\HomeController::class, 'result'])->name("quizResult");

Route::group(['middleware' => ['auth' , 'isAdmin'], 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function(){
    //QUİZ
    Route::get("quiz" , "QuizController@index")->name("quizPanel");
    Route::get("quizekle" , "QuizController@create")->name("quizCreate");
    Route::post("ekle" , "QuizController@store")->name("quizStore");
    Route::get("quizduzenle/{id}" , "QuizController@edit")->name("quizEdit");
    Route::post("duzenle/{id}" , "QuizController@update")->name("quizUpdate");
    Route::get("sil/{id}" , "QuizController@destroy")->name("quizDelete");
    Route::get("bilgi/{id}", "QuizController@info")->name("quizInfo");

    //QUESTİON
    Route::get("quiz/{quiz_id}/sorular" , "QuestionController@index")->name("questionPanel");
    Route::get("quiz/{quiz_id}/soruekle" , "QuestionController@create")->name("questionCreate");
    Route::post("quiz/{quiz_id}/ekle" , "QuestionController@store")->name("questionStore");
    Route::get("quiz/{quiz_id}/soruduzenle/{question_id}", "QuestionController@edit")->name("questionEdit");
    Route::post("quiz/{quiz_id}/soruduzenle/{question_id}", "QuestionController@update")->name("questionUpdate");
    Route::get("quiz/{quiz_id}/sorusil/{question_id}", "QuestionController@destroy")->name("questionDelete");
    

});