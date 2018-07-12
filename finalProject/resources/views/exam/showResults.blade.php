@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg8.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('exam.slidebar')


            <div class="col-md-9">
                <div class="content-wrapper">
                    <p><b>No of Question : </b>{{ $noOfQues }}</p>
                    <p><b>Correct Answer : </b>{{ $correctAns }}</p>
                    <p><b>Rate : </b>{{ $percantage }} %</p>
                </div>
            </div>
        </div>
    </div>
@endsection
