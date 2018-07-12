@extends('main')

@section('title', '| Edit Question')

@section('bg-img', asset('public/img/bg10.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('question.slidebar')


            <div class="col-md-9">

                <div class="content-wrapper">
                    <form action="" method="POST">
                        {{--<input type="hidden" name="id" value="{{ $questionById->id }}">--}}
                        {!! csrf_field() !!}
                        <table class="table">
                            @foreach($questionById as $question)
                            <tr>
                                <td>Subject </td>
                                <td> : </td>
                                <td>
                                    {{ $question->name }}
                                        {{--@foreach($cats as $cat)--}}
                                            {{--<option value="{{$cat->id}}">{{$cat->name}} </option>--}}
                                        {{--@endforeach--}}

                                </td>
                            </tr>

                            <tr style="height: 70px;">
                                <td>Question</td>
                                <td> : </td>
                                <td><p>{{ $question->question }}</p></td>
                                {{--<td><input class="form-control" id="exampleFormControlInput1" value="{{ $questionById->question }}" type="text" name="question" placeholder="Enter Question " required /></td>--}}
                            </tr>

                            <tr style="height: 70px;">
                                <td>Choice One</td>
                                <td> : </td>
                                <td><p>{{ $question->optionA }}</p></td>
{{--                                <td><input class="form-control" id="exampleFormControlInput1" value="{{ $question->optionA }}"  type="text" name="optionA" placeholder="Enter Choice One.... " required /></td>--}}
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Two</td>
                                <td> : </td>
                                <td><p>{{ $question->optionB }}</p></td>
                                {{--<td><input class="form-control" id="exampleFormControlInput1" value="{{ $question->optionB }}"  type="text" name="optionB" placeholder="Enter Choice Two.... " required /></td>--}}
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Three</td>
                                <td> : </td>
                                <td><p>{{ $question->optionC }}</p></td>
                                {{--<td><input class="form-control" id="exampleFormControlInput1" value="{{ $question->optionC }}"  type="text" name="optionC" placeholder="Enter Choice Three.... " required /></td>--}}
                            </tr>
                            <tr style="height: 70px;">
                                <td>Choice Four</td>
                                <td> : </td>
                                <td><p>{{ $question->optionD }}</p></td>

                            </tr>

                            <tr style="height: 70px;">
                                <td>Correct Option: </td>
                                <td> : </td>
                                <td><p>{{ $question->answer }}</p></td>

                            </tr>
                            <tr>
                                <td>Question Difficulty Level </td>
                                <td> : </td>
                                <td><p>{{ $question->difficultyLevel }}</p></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td>Question Category </td>--}}
                                {{--<td> : </td>--}}
                                {{--<td><p>{{ $question->difficultyLevel }}</p></td>--}}
                                {{--<td>--}}
                                    {{--@if( $question->publicationStatus == "1")--}}
                                        {{--<p>Published</p>--}}
                                    {{--@elseif()--}}
                                        {{--<p>Unpublished</p>--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}

                                {{--<td colspan="3" align="center">--}}
                                    {{--<input class="btn btn-primary btn-lg btn-block" type="submit" value="Update Question"/>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            @endforeach
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
