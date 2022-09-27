<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\QuestionBank;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/details/{id}', [HomeController::class, 'examDetails']);
Route::post('/submit-answer', [HomeController::class, 'submitAnswer']);
Route::get('/create-question-bank', [HomeController::class, 'questionBank']);
Route::post('/question-bank-create', [HomeController::class, 'questionBankCreate']);
Route::get('/create-question', [HomeController::class, 'question']);
Route::post('/question-create', [HomeController::class, 'questionCreate']);

Route::get('/create-question', [HomeController::class, 'question']);
Route::post('/question-create', [HomeController::class, 'questionCreate']);

Route::get('/create-exam', [HomeController::class, 'exam']);
Route::post('/exam-create', [HomeController::class, 'examCreate']);

Route::get('/create-exam-question', [HomeController::class, 'examQuestion']);
Route::post('/add-exam-question', [HomeController::class, 'addExamQuestion']);
Route::get('/edit-exam-question/{id}', [HomeController::class, 'editExamQuestion']);
Route::get('/delete-exam-question/{id}', [HomeController::class, 'deleteExamQuestion']);
Route::post('/update-exam-question', [HomeController::class, 'UpdateExamQuestion']);


Route::get('/filter-question/{id}', function ($id) {
    $questions = QuestionBank::where('id', $id)->with('questions')->first();
    return response()->json(['questions' => $questions, 'success' => 1], 200);
});
