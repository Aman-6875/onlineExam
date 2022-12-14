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

Route::get('/', function () {
    return view('start');
});



Route::get('/filter-question/{id}', function ($id) {
    $questions = QuestionBank::where('id', $id)->with('questions')->first();
    return response()->json(['questions' => $questions, 'success' => 1], 200);
});


Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('registration', [HomeController::class, 'registration']);


Route::post('user-login', [HomeController::class, 'LoginUser']);
Route::post('user-register', [HomeController::class, 'RegisterUser']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [HomeController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index']);
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
});
