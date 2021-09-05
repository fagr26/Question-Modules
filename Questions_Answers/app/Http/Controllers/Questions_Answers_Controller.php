<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;

class Questions_Answers_Controller extends Controller
{
    public function add_question(Request $request){
                $request->validate([
                   'questions'=>'required'
                ]);

                $added = new Questions();
                $added->questions=$request->questions;
                $added->save();
                return response()->json(['message'=>'question added'],200);

    }
    public function delete_question(Request $request,$QuestionID){
    
        $question = Questions::find($QuestionID);
        $question->delete();
        return response()->json(['message'=>'question deleted'],200);

}
public function add_answer(Request $request){
    
    $added_answer = new Answers();
    $added_answer->QuestionID=$request->QuestionID;
    $added_answer->answers=$request->answers;
    $added_answer->save();
    return response()->json(['message'=>'answer added'],200);

}
public function delete_answer(Request $request,$id){
    
    $question = Answers::find($id);
    $question->delete();
    return response()->json(['message'=>'answer deleted'],200);

}
public function show(){
   $data=Questions::join('answers','answers.QuestionID','=','questions.QuestionID')
                     ->get(['questions.questions','answers.answers']);                
          return response()->json($data);         
    

}

}
