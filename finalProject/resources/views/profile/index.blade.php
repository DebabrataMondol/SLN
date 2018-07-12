@extends('main')

@section('title', '| Profile')

@section('bg-img', asset('public/img/bg7.jpg'))

@section('content')

    <div class="container">


        <div class="row">

            {{--@include('profile.slideBar')--}}
            @foreach($userData as $uData)
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $uData->name }}</div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <h3 align="center">{{ ucwords($uData->name) }}</h3>
                                        <img src="{{ url('/') }}/public/img/{{$uData->pic}}" width="80px" height="80px" class="img-circle" />
                                        <div class="caption">

                                            <h4 align="center"><b>City: </b>{{$uData->city}} - {{$uData->zipcode}}</h4>
                                            <h4 align="center"><b>Country: </b>{{$uData->country}}</h4>
                                            @if ($uData->user_id == Auth::user()->id)
                                                <p align="center"><a href="{{url('/editProfile')}}" class="btn btn-primary" role="button">Edit Profile</a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="col-sm-6 col-md-4">
                                        <h4><span class="label label-default">Occupation</span></h4>
                                        <p>{{$uData->occupation}}</p>
                                        <h4><span class="label label-default">Institute Name</span></h4>
                                        <p>{{$uData->instituteName}}</p>
                                        <h4><span class="label label-default">Expertise Area</span></h4>
                                        <p>{{$uData->expertiseArea}}</p>
                                    </div>
                                    <div class="col-sm-6 col-md-4">

                                        <h4><span class="label label-default">Interested Topic</span></h4>
                                        <p>{{$uData->interestedTopic}}</p>
                                        <h4><span class="label label-default">About</span></h4>
                                        <p>{{$uData->about}}</p>
                                    </div>
                                </div>

                            </div>

                            <div class="well-lg">
                                <div class="col-sm-6 col-md-3">
                                    @if ($uData->userType == 'teacher' && $uData->user_id == Auth::user()->id)
                                       <p align="center"><a style="width: 500px; margin-left: 100px;" href="{{ url('/teacher') }}" class="btn btn-primary" role="button">My Activity</a></p>
                                    @endif

                                        @if ($uData->userType == 'student' && $uData->user_id == Auth::user()->id)
                                            <p align="center"><a style="width: 500px; margin-left: 100px;" href="{{ url('/exam/home') }}" class="btn btn-primary" role="button">Attend Exam</a></p>
                                        @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
