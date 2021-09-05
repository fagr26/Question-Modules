<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Questions_Answers_Controller;

Route::post('questions/add',[Questions_Answers_Controller::class,'add_question']);
Route::delete('questions/delete/{QuestionID}',[Questions_Answers_Controller::class,'delete_question']);
Route::post('answers/add',[Questions_Answers_Controller::class,'add_answer']);
Route::delete('answers/delete/{id}',[Questions_Answers_Controller::class,'delete_answer']);
Route::get('questions/show',[Questions_Answers_Controller::class,'show']);




