<?php

use App\Http\Controllers\Admin\AccessRoomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuestionGroupController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Controller;
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
    return redirect()->route('home');
});
Route::get('home', [Controller::class, 'index'])->name('home');
Route::post('key', [Controller::class, 'submitKey'])->name('submit-key');
Route::get('register', [Controller::class, 'register'])->name('register');
Route::post('register', [Controller::class, 'submitRegister']);
Route::get('about-quiz', [Controller::class, 'aboutQuiz'])->name('about-quiz');
Route::post('about-quiz', [Controller::class, 'startQuiz']);
Route::get('quiz', [Controller::class, 'quiz'])->name('quiz');
Route::get('quiz2', function () {return view('quiz2');});
Route::post('save-progress',[Controller::class,'saveProgress'])->name('save-progress');
Route::get('authentication', function () {
    return view('authentication');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [Controller::class, 'login'])->name('login');
    Route::post('login', [Controller::class, 'doLogin'])->name('login');
    Route::get('logout', [Controller::class, 'doLogout'])->name('logout');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::put('profile', [ProfileController::class, 'updateProfile']);
        Route::group(['prefix' => 'user'], function () {
            Route::get('', [UserController::class, 'index'])->name('admin.user');
            Route::get('add', [UserController::class, 'add'])->name('admin.user.add');
            Route::post('add', [UserController::class, 'create']);
            Route::get('{user}', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::put('{user}', [UserController::class, 'update']);
            Route::delete('{user}', [UserController::class, 'delete']);
        });
        Route::group(['prefix' => 'room'], function () {
            Route::get('', [RoomController::class, 'index'])->name('admin.room');
            Route::get('add', [RoomController::class, 'add'])->name('admin.room.add');
            Route::post('add', [RoomController::class, 'create']);
            Route::get('{room}', [RoomController::class, 'edit'])->name('admin.room.edit');
            Route::put('{room}', [RoomController::class, 'update']);
            Route::delete('{room}', [RoomController::class, 'delete']);
        });
        Route::group(['prefix' => 'access-room'], function () {
            Route::get('', [AccessRoomController::class, 'index'])->name('admin.access-room');
            Route::get('add', [AccessRoomController::class, 'add'])->name('admin.access-room.add');
            Route::post('add', [AccessRoomController::class, 'create']);
            Route::get('{access_room}', [AccessRoomController::class, 'edit'])->name('admin.access-room.edit');
            Route::put('{access_room}', [AccessRoomController::class, 'update']);
            Route::delete('{access_room}', [AccessRoomController::class, 'delete']);
        });
        Route::group(['prefix' => 'question-group'], function () {
            Route::get('', [QuestionGroupController::class, 'index'])->name('admin.question-group');
            Route::get('add', [QuestionGroupController::class, 'add'])->name('admin.question-group.add');
            Route::post('add', [QuestionGroupController::class, 'create']);
            Route::get('{question_group}', [QuestionGroupController::class, 'edit'])->name('admin.question-group.edit');
            Route::put('{question_group}', [QuestionGroupController::class, 'update'])->name('admin.question-group.edit');
            Route::delete('{question_group}', [QuestionGroupController::class, 'delete']);
            Route::group(['prefix' => '{question_group}/section'], function () {
                Route::get('', [QuestionGroupController::class, 'section'])->name('admin.question-group.section');
                Route::group(['prefix' => '{section}/questions'], function () {
                    Route::get('', [QuestionGroupController::class, 'questions'])->name('admin.question-group.section.questions');
                    Route::post('', [QuestionGroupController::class, 'createQuestions']);
                    Route::put('{question}', [QuestionGroupController::class, 'updateQuestions'])->name('admin.question-group.section.questions.update');
                    Route::delete('{question}', [QuestionGroupController::class, 'deleteQuestions'])->name('admin.question-group.section.questions.delete');
                });
            });
        });
    });
});
