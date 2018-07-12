<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*',function($view){
            $noq = DB::table('questions')
                ->where('publicationStatus',1)
                ->count();
            $view->with('noq',$noq);

        });

        View::composer('*',function($view){
            $noOfUsers = DB::table('users')
//                ->where('publicationStatus',1)
                ->count();
            $view->with('noOfUsers',$noOfUsers);

        });

        View::composer('*',function($view){
            $noOfTeachers = DB::table('users')
                ->where('userType','teacher')
                ->count();
            $view->with('noOfTeachers',$noOfTeachers);

        });

        View::composer('*',function($view){
            $noOfStudents = DB::table('users')
                ->where('userType','teacher')
                ->count();
            $view->with('noOfStudents',$noOfStudents);

        });

        View::composer('*',function($view){
            $noOfPosts = DB::table('posts')
                ->count();
            $view->with('noOfPosts',$noOfPosts);

        });

        View::composer('*',function($view){
            $noOfCategories = DB::table('categories')
                ->count();
            $view->with('noOfCategories',$noOfCategories);

        });

        View::composer('*',function($view){
            $noOfTags = DB::table('tags')
                ->count();
            $view->with('noOfTags',$noOfTags);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
