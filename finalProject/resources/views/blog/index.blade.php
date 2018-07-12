@extends('main')

@section('title', '| Blog')

@section('bg-img', asset('public/img/question1.jpg'))

@section('content')


	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>:: Recent Questions ::</h1>
		</div>
	</div>

	@foreach ($posts as $post)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>{{ $post->title }}</h3>
			<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

			<p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? '...' : "" }}</p>

			{{--<a href="{{ route('blog.single', $post->id) }}" class="btn btn-primary">Read More</a>--}}
			<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
			<hr>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>


@endsection