<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function admin(){
        $uid = Auth::user()->id;
        $allUsers = DB::table('users')
            ->where('users.id', '=', $uid)
            ->first();

        if($allUsers->admins == 1){
            return view('admin.home');
        }else{
            return view('errors.503');
        }

    }

    public function users(){

        $data = DB::table('users')
            ->where('users.admins', '=', 0)
            ->get();

        $uid = Auth::user()->id;
        $allUsers = DB::table('users')
            ->where('users.id', '=', $uid)
            ->first();

        if($allUsers->admins == 1){
            return view('admin.users', compact('data'));
        }else{
            return view('errors.503');
        }



    }

    public function banUser(Request $request){
        //return $request->all();
        $status = $request->status;
        $userID = $request->userID;
        $update_status = DB::table('users')
            ->where('id', $userID)
            ->update([
                'status' => $status
            ]);
        if($update_status){
            echo "status updated successfully";
        }
    }


}
