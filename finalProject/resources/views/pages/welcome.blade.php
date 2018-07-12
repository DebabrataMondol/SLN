@extends('main')

@section('title', '| Homepage')

@section('bg-img', asset('public/img/bg1.jpg'))
@section('headerContent')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <h2 style="text-align: center">Welcome to <b>Social Learning Network!</b></h2>
            <p class="lead" style="text-align: center">Thank you so much for visiting. Please contribute for this <b>Learning Platform.</b></p>
        </div>
        {{--<p><b> : </b> </p>--}}


        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Questions</b> : {{$noq}}</div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Users</b> : {{$noOfUsers}}</div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Teachers</b> : {{$noOfTeachers}}</div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Students</b> : {{$noOfStudents}}</div>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Posts</b> : {{$noOfPosts}}</div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Categories</b> : {{$noOfCategories}}</div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>No of total Tags</b> : {{$noOfTags}}</div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Student Access</b></div>
                    <div class="panel-body">
                        <p align="center"><a style="width: 100%;" href="{{ url('/exam/home') }}" class="btn btn-primary" role="button">Attend Exam</a></p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Teacher Access</b></div>
                    <div class="panel-body">
                        <p align="center"><a style="width: 100%;" href="{{ url('/teacher') }}" class="btn btn-primary" role="button">My Activity</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('content')
        <div class="row">
            <div class="col-md-12">
                {{--<div class="jumbotron">--}}
                    {{--<h2><b>Welcome to Social Learning Network!</b></h2>--}}
                    {{--<p class="lead">Thank you so much for visiting. Please contribute for our website.</p>--}}
                {{--</div>--}}
            </div>
        </div> <!-- end of header .row -->


        <div class="row">
            <div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">

                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>



            <div class="col-md-3 col-md-offset-1">
                <h2></h2>
            </div>
        </div>
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>

@stop