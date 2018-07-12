@extends('main')

@section('title', '| Exam Question')

@section('bg-img', asset('public/img/bg4.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('exam.slidebar')


            <div class="col-md-9">

                <form action="{{ url('/exam/showResults') }}" method="POST">
                    {!! csrf_field() !!}
                    <?php $i=-1;?>

                    @foreach($questions as $question)

                        <div class="container" style="width: 100%; float: left; border: 1px solid gold; margin: 2px 2px;">
                            <h3><b><?php echo $i+2;?>.</b>  {{$question->question}}</h3>
                            <?php $i++;?>
                            {{-- <h3 class="text-center text-success">{{Session::get('message')}}</h3> --}}
                            <div style="width: 100%; float: left;">
                                <div>
                                    <input type="radio" name="<?php echo "a[".$i."]";?>" value="{{$question->optionA}}" />
                                    <input type="hidden" name="<?php echo "b[".$i."]";?>" value="{{$question->answer}}" />
                                    <label for="question-1-answers-A">{{$question->optionA}}</label>
                                </div>

                                <div>
                                    <input type="radio" name="<?php echo "a[".$i."]";?>" value="{{$question->optionB}}" />
                                    <label for="question-1-answers-B">{{$question->optionB}}</label>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <input type="radio" name="<?php echo "a[".$i."]";?>" value="{{$question->optionC}}" />
                                    <label for="question-1-answers-C">{{$question->optionC}}</label>
                                </div>

                                <div>
                                    <input type="radio" name="<?php echo "a[".$i."]";?>" value="{{$question->optionD}}" />
                                    <label for="question-1-answers-D">{{$question->optionD}}</label>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div>
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"/>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
