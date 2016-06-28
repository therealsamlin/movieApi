@extends('layout')


@section('content')
    <h1>Edit the review</h1>

    <form method="post" action="/review/{{ $review->id }}">

        {{ method_field('PUT') }}

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">

            <textarea class="form-control" name="body">{{ $review->body }}</textarea>

        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Add Review">

        </div>

    </form>
@stop