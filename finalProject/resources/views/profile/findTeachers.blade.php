@extends('main')

@section('title', '| Teachers List')

@section('bg-img', asset('public/img/teacher.jpg'))

@section('content')

    <div class="container">



        <div class="row">
            @include('profile.slidebar')


            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ucwords(Auth::user()->name)}}</div>

                    <div class="panel-body">
                        <div class="col-sm-12 col-md-12">
                            @foreach($allUsers as $uList)

                                <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                                    <div class="col-md-2 pull-left">
                                        <img src="{{url('/')}}/public/img/{{$uList->pic}}"
                                             width="80px" height="80px" class="img-circle"/>
                                    </div>

                                    <div class="col-md-7 pull-left">
                                        <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}">
                                                {{ucwords($uList->name)}}</a></h3>
                                        <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                                        <p>{{$uList->about}}</p>

                                    </div>

                                </div>
                            @endforeach
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
