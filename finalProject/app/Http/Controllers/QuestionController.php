<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Category;
use DB;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function addQuestions(){
        $cats = DB::table('categories')
            ->get();
        return view('question.addQuestion', compact('cats'));
    }

    public function storeQuestions(Request $request){
        $question = new Question;
        $question->cat_id = $request->cat_id;
        $question->question = $request->question;
        $question->optionA = $request->optionA;
        $question->optionB = $request->optionB;
        $question->optionC = $request->optionC;
        $question->optionD = $request->optionD;
        $question->answer = $request->answer;
        $question->difficultyLevel = $request->difficultyLevel;
        $question->publicationStatus = $request->publicationStatus;
        $question->save();
        return back();
    }

    public function showQuestions(){
        $questions = DB::table('questions')
            ->join('categories', 'questions.cat_id', '=', 'categories.id')
            ->select('questions.*','categories.name')
            ->orderBy('questions.id','asc')
            ->get();

        return view('question.questionList', compact('questions'));
    }

    public function showDetailQuestions($id){
//        $questionById = Question::find($id);
//        $cats = Category::all();

        $questionById = DB::table('questions')
            ->join('categories',  'questions.cat_id', '=', 'categories.id')
            ->select('questions.*', 'categories.name')
            ->where('questions.id','=',$id)
            ->get();
//        dd($questionById);
        return view('question.detailQuestionList', ['questionById' => $questionById]);
    }

    public function editQuestions($id){

        $questionById = Question::find($id);
        $cats = Category::all();
        return view('question.editQuestion', ['questionById' => $questionById, 'cats' => $cats]);
    }

    public function updateQuestions(Request $request) {

        $questionById = Question::find($request->id);
        $questionById->cat_id = $request->cat_id;
        $questionById->question = $request->input('question');
        $questionById->optionA = $request->input('optionA');
        $questionById->optionB = $request->input('optionB');
        $questionById->optionC = $request->input('optionC');
        $questionById->optionD = $request->input('optionD');
        $questionById->answer = $request->input('answer');
        $questionById->difficultyLevel = $request->input('difficultyLevel');
        $questionById->publicationStatus = $request->input('publicationStatus');
        $questionById->save();
        return back();

    }

    public function getDeleteQuestion($id)
    {
        $question = Question::find($id);
        if ($question != null) {
            $question->delete();
            return back();
        }

    }


    public function unpublishedQuestions(Request $request) {
        $questionById = Question::find($request->question_id);
        $questionById->publicationStatus = 0;
        $questionById->save();
        return redirect('/questions/questionList')->with('message', 'Question unpublished successfully');
    }

    public function publishedQuestions(Request $request) {
        $questionById = Question::find($request->question_id);
        $questionById->publicationStatus = 1;
        $questionById->save();
        return redirect('/questions/questionList')->with('message', 'Question published successfully');
    }


//    public function deleteQuestion(Request $request) {
//
//        $questionId = $request->id;
//
//        $question = Question::find($questionId);
//        $question->delete();
//
//        return back();
//    }


//    public function destroy($id)
//    {
//        $question = Question::find($id);
//        $question->delete();
//
//        return view('question.questionList');
//    }

}
