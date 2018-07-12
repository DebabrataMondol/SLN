<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use DB;


class ExamController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){

        $uid = Auth::user()->id;
        $cats = DB::table('categories')
        ->get();
//        $questions = DB::table('questions')
//            ->where('publicationStatus')
//            ->get();

        $allUsers = DB::table('users')
            ->where('users.id', '=', $uid)
            ->first();

        if($allUsers->userType == "student"){
            return view('exam.home', compact('cats'));
        }else {
            return view('errors.503');
        }

    }

    public function showQuestions(Request $request){

        $questions = DB::table('questions')
        ->join('categories', 'questions.cat_id', '=', 'categories.id')
        ->select('questions.*','categories.name')
        ->where('questions.cat_id', '=', $request->cat_id)
        ->where('questions.difficultyLevel', '=', $request->difficultyLevel)
        ->where('questions.publicationStatus', '=', 1)
        ->take($request->noOfQuestions)
        ->orderBy('questions.id','asc')
        ->get();

//        $questions = DB::table('questions')
//            ->where('cat_id', '=', $request->cat_id)
//            ->where('difficultyLevel', '=', $request->difficultyLevel)
//            ->where('publicationStatus', '=', 1)
//            ->take('noOfQuestions','=', $request->noOfQuestions)
//            ->get();
// if(sizeof($questions) < $request->noOfQuestions)
//                 return view('exam.showExamTest', compact('questions'))->with('message','There are not enough questions in the database!');


        return view('exam.showExamTest', compact('questions'));
    }
    public function showResult(Request $request)
    {
        $xyz = [];
        $abc = [];
        $count = 0;
        foreach ($request->a as $x) array_push($xyz,$x);
//        dd($xyz);
        foreach ($request->b as $x) array_push($abc,$x);
        for ($i=0;$i<sizeof($abc);$i++)
        {
            if($xyz[$i]==$abc[$i]) $count++;
        }

        $noOfQues = sizeof($abc);
        $correctAns = $count;
        $percantage = ($count/sizeof($abc)*100.0);


//        echo "Number of Questions: ".sizeof($abc)."<br>";
//        echo "Correct Answers: ".$count."<br>";
//        echo "Rate: ".($count/sizeof($abc)*100.0)."%";

//        $noQues = sizeof($abc);
//        $percantage = ($count/sizeof($abc)*100.0)

        $data = [];
//        $data = ['noQues'] = $noQues;
//        $data = ['count'] = $count;
//        $data = ['percantage'] = $percantage;


        return view('exam.showResults',  compact('noOfQues', 'correctAns', 'percantage'));


    }




}
