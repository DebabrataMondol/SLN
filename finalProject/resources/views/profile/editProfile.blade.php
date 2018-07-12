@extends('main')

@section('title', '| Profile')

@section('bg-img', asset('public/img/bg14.jpg'))

@section('content')

    <div class="container">

        <div class="row">

            {{--@include('profile.slideBar')--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->name }}</div>

                    <div class="panel-body">

                        <div class="col-sm-12 col-md-12">
                            <div class="thumbnail">
                                <h3 align="center">{{ ucwords(Auth::user()->name) }}</h3>
                                <img src="{{ url('/') }}/public/img/{{Auth::user()->pic}}" width="80px" height="80px" class="img-circle" />
                                <div class="caption">

                                    <h4 align="center">{{$data->city}} - {{$data->country}}</h4>
                                    <p align="center">{{$data->interestedTopic}}</p>
                                    <p align="center"><a href="{{url('/')}}/changePhoto" class="btn btn-primary" role="button">Change Image</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">

                            <form action="{{url('/updateProfile')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span id="basic-addon1">City Name</span>
                                        <input type="text" class="form-control" value="{{$data->city}}" name="city">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span id="basic-addon1">Zip Code</span>
                                        <input type="text" class="form-control" value="{{$data->zipcode}}" name="zipcode">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span id="basic-addon1">Country Name</span>
                                        <input type="text" class="form-control" value="{{$data->country}}" name="country">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span id="basic-addon1">Occupation</span>
                                        <input type="text" class="form-control" value="{{$data->occupation}}" name="occupation">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span id="basic-addon1">Institute Name</span>
                                        <input type="text" class="form-control" value="{{$data->instituteName}}" name="instituteName">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span id="basic-addon1">Expertise Area</span>
                                        <input type="text" class="form-control" value="{{$data->expertiseArea}}" name="expertiseArea">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span id="basic-addon1">Interested Topic</span>
                                        <input type="text" class="form-control" value="{{$data->interestedTopic}}" name="interestedTopic">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span id="basic-addon1">About</span>
                                        <textarea type="text" class="form-control" value="{{$data->about}}" rows="6" cols="25" style="overflow-y: scroll;" name="about"> </textarea>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-success pull-right">
                                    </div>
                                </div>
                            </form>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
