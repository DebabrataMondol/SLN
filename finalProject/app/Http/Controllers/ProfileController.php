<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($slug){
        $userData = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('slug',$slug)
            ->get();

        return view('profile.index', compact('userData'))->with('data', Auth::user()->Profile);

//        return view('profile.index');
    }

    public function changePhoto(){
        return view('profile.pic');
    }

    public function uploadPhoto(Request $request){

        $file = $request->file('pic');
        $fileName = $file->getClientOriginalName();
        $path = 'public/img';
        $file->move($path, $fileName);
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        DB::table('users')
            ->where('id', $user_id)
            ->update(['pic' => $fileName]);

       return back();

    }

    public function editProfileForm(){
        return view('profile.editProfile')->with('data', Auth::user()->Profile);
    }

    public function updateProfile(Request $request){
        $user_id = Auth::user()->id;
        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        return back();
    }

    public function findStudents(){

        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', $uid)
             ->where('users.userType', '!=', 'teacher')
            ->get();

        return view('profile.findStudents', compact('allUsers'));
    }

    public function findTeachers(){

        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', $uid)
             ->where('users.userType', '=', 'teacher')
            ->get();

        return view('profile.findTeachers', compact('allUsers'));
    }
}
