<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

use Auth;
use DB;

class TeacherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){

        $uid = Auth::user()->id;
        $allUsers = DB::table('users')
            ->where('users.id', '=', $uid)
            ->first();

        if($allUsers->userType == "teacher"){
            return view('question.home');
        }else{
            return view('errors.503');
        }

    }

    public function addQuestion(){

        return view('teacher.addQuestion');
    }
}
