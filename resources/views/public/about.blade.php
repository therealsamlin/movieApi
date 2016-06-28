@extends('layout')

@section('content')

    <div class="container">
        @unless (empty($people))
            There are some people
        @endunless

        @foreach ($people as $person)
            <li>{{ $person }}</li>
        @endforeach
    </div>
@stop

@section('footer')

    <script>

        alert('About Page');

    </script>

@stop
