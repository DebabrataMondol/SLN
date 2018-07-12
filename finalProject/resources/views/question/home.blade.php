@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg11.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('question.slidebar')


            <div class="col-md-9 center-block">
                <h1>Welcome to Question & Exam corner</h1>
                <h3>Teacher can Easily Set multiple choice Question Set</h3>
            </div>
        </div>
    </div>
@endsection
