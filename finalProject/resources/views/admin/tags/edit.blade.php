
@extends('admin.app')

@section('title', "| Edit Tag")

@section('main-content')

    <div class="content-wrapper">
        {{ Form::model($tag, ['route' => ['admin.tags.update', $tag->id], 'method' => "PUT"]) }}

        {{ Form::label('name', "Title:") }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::submit('Save Changes', ['class' => 'btn btn-success from-spacing-top']) }}

        {{ Form::close() }}
    </div>

@endsection