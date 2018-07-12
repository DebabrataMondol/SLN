@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg12.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('question.slidebar')


            <div class="col-md-10">



                <div class="table-responsive-sm">
                    <table class="table table-hover">

                        <thead>
                        <th>Serial</th>
                        <th>Category Name</th>
                        <th>Question</th>
                        {{--<th>Option A</th>--}}
                        {{--<th>Option B</th>--}}
                        {{--<th>Option C</th>--}}
                        {{--<th>Option D</th>--}}
                        <th>Answer</th>
                        <th>Difficulty Level</th>
                        <th>Action</th>
                        </thead>

                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($questions as $question)
                            <tr>
                                <td>{!! $i !!}</td>

                                @if($question->publicationStatus==1)
                                    <td style="background-color:greenyellow">{!! $question->name !!}</td>
                                @else
                                    <td style="background-color:red">{!! $question->name !!}</td>
                                @endif

                                <td>{!! $question->question !!}</td>
                                {{--<td>{!! $question->optionA !!}</td>--}}
                                {{--<td>{!! $question->optionB !!}</td>--}}
                                {{--<td>{!! $question->optionC !!}</td>--}}
                                {{--<td>{!! $question->optionD !!}</td>--}}
                                <td>{!! $question->answer !!}</td>
                                <td>{!! $question->difficultyLevel !!}</td>
                                <td>

                                    @if($question->publicationStatus == 1)

                                        <form action="{{ route('unpublished-questions') }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}

                                            <input type="hidden" value="{{ $question->id }}" name="question_id">
                                            <button type="submit" class="btn btn-primary btn-sm" title="Unpublished">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </button>
                                        </form>

                                    @else

                                        <form action="{{ route('published-questions') }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}

                                            <input type="hidden" value="{{ $question->id }}" name="question_id">
                                            <button type="submit" class="btn btn-warning btn-sm" title="Published">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </button>
                                        </form>

                                    @endif

                                    <a href="{{ url('/questions/editQuestion/'.$question->id) }}" title="Edit" class="btn btn-success btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="{{ url('/questions/questionDelete/'.$question->id) }}" title="Delete"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                        <a href="{{ url('/questions/detailQuestionList/'.$question->id) }}" title="View" class="btn btn-primary btn-sm">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                </td>
                                {{--<td><span class="glyphicon glyphicon-edit"></span> &nbsp; <span class="glyphicon glyphicon-trash"></span></td>--}}

                            </tr>

                            <?php $i++; ?>
                        @endforeach
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
