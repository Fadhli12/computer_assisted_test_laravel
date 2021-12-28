<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccessRoomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\QuestionGroupController;
use App\Http\Controllers\Admin\RoomController;
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

Route::group(['prefix' => 'admin'],function(){
    Route::get('',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::group(['prefix' => 'room'],function (){
        Route::get('',[RoomController::class,'index'])->name('admin.room');
        Route::get('add',[RoomController::class,'add'])->name('admin.room.add');
        Route::post('add',[RoomController::class,'create']);
        Route::get('{room}',[RoomController::class,'edit'])->name('admin.room.edit');
        Route::put('{room}',[RoomController::class,'update']);
        Route::delete('{room}',[RoomController::class,'delete']);
    });
    Route::group(['prefix' => 'question-group'],function (){
        Route::get('',[QuestionGroupController::class,'index'])->name('admin.question-group');
        Route::get('add',[QuestionGroupController::class,'add'])->name('admin.question-group.add');
        Route::post('add',[QuestionGroupController::class,'create']);
        Route::get('{question_group}',[QuestionGroupController::class,'edit'])->name('admin.question-group.edit');
        Route::put('{question_group}',[QuestionGroupController::class,'update'])->name('admin.question-group.edit');
        Route::delete('{question_group}',[QuestionGroupController::class,'delete']);
        Route::group(['prefix' => '{question_group}/section'],function (){
            Route::get('',[QuestionGroupController::class,'section'])->name('admin.question-group.section');
            Route::group(['prefix' => '{section}/questions'],function(){
                Route::get('',[QuestionGroupController::class,'questions'])->name('admin.question-group.section.questions');
                Route::post('',[QuestionGroupController::class,'createQuestions']);
                Route::put('{question}',[QuestionGroupController::class,'updateQuestions'])->name('admin.question-group.section.questions.update');
                Route::delete('{question}',[QuestionGroupController::class,'deleteQuestions'])->name('admin.question-group.section.questions.delete');
            });
        });
    });
});
