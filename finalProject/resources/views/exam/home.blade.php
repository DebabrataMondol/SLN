@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg8.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('exam.slidebar')


            <div class="col-md-9">
                <div class="content-wrapper">
                    <form action="{{ url('/exam/showExamTest') }}" method="POST">
                        {!! csrf_field() !!}
                        <table class="table">
                            <tr>
                                <td>Question Subject </td>
                                <td> : </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="cat_id">
                                        <option>
                                            Select A Subject
                                        </option>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}} </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Question Difficulty Level </td>
                                <td> : </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1"  name="difficultyLevel">
                                        <option value="easy">
                                            Easy
                                        </option>
                                        <option value="medium">
                                            Medium
                                        </option>
                                        <option value="hard">
                                            Hard
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Number of Questions</td>
                                <td> : </td>

                                <td><input class="form-control" id="exampleFormControlInput1"  type="number" name="noOfQuestions"  placeholder="Enter your numbers " required /></td>

                            </tr>
                            <tr>

                                <td colspan="3" align="center">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Search Questions"/>
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
