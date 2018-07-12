@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg9.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('question.slidebar')


            <div class="col-md-9">

                <div class="content-wrapper">
                    <form action="{{ url('/questions/add') }}" method="POST">
                        {!! csrf_field() !!}
                        <table class="table">
                            <tr>
                                <td>Subject </td>
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

                            <tr style="height: 70px;">
                                <td>Question</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1" type="text" name="question" placeholder="Enter Question " required /></td>
                            </tr>

                            <tr style="height: 70px;">
                                <td>Choice One</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1"  type="text" name="optionA" placeholder="Enter Choice One.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Two</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1"  type="text" name="optionB" placeholder="Enter Choice Two.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Three</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1"  type="text" name="optionC" placeholder="Enter Choice Three.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Four</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1"  type="text" name="optionD" placeholder="Enter Choice Four.... " required /></td>
                            </tr>

                            <tr style="height: 70px;">
                                <td>Correct Option: </td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1"  type="text" name="answer" required /></td>
                            </tr>
                            <tr>
                                <td>Question Difficulty Level </td>
                                <td> : </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="difficultyLevel">
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
                                <td>Question Category </td>
                                <td> : </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="publicationStatus">
                                        <option value="1">
                                            Published
                                        </option>
                                        <option value="0">
                                            Unpublished
                                        </option>

                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <td colspan="3" align="center">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Add Question"/>
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
