@extends('main')

@section('title', '| Edit Question')

@section('bg-img', asset('public/img/bg10.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('question.slidebar')


            <div class="col-md-9">

                <div class="content-wrapper">
                    <form action="{{ url('/questions/updateQuestion') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $questionById->id }}">
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
                                <td><input class="form-control" id="exampleFormControlInput1" value="{{ $questionById->question }}" type="text" name="question" placeholder="Enter Question " required /></td>
                            </tr>

                            <tr style="height: 70px;">
                                <td>Choice One</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1" value="{{ $questionById->optionA }}"  type="text" name="optionA" placeholder="Enter Choice One.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Two</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1" value="{{ $questionById->optionB }}"  type="text" name="optionB" placeholder="Enter Choice Two.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Three</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlInput1" value="{{ $questionById->optionC }}"  type="text" name="optionC" placeholder="Enter Choice Three.... " required /></td>
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Four</td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlSelect1" value="{{ $questionById->optionD }}"  type="text" name="optionD" placeholder="Enter Choice Four.... " required /></td>
                            </tr>

                            <tr style="height: 70px;">
                                <td>Correct Option: </td>
                                <td> : </td>
                                <td><input class="form-control" id="exampleFormControlSelect1" value="{{ $questionById->answer }}"  type="text" name="answer" required /></td>
                            </tr>
                            <tr>
                                <td>Question Difficulty Level </td>
                                <td> : </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="difficultyLevel" value="{{ $questionById->difficultyLevel }}">
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
                                    <select class="form-control" id="exampleFormControlSelect1" value="{{ $questionById->publicationStatus }}" name="publicationStatus">
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
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Update Question"/>
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
