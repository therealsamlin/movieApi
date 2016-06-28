@extends('layout')

@section('content')

    <h1>All Items</h1>

    @foreach ($items as $item)
        <li><a href="{{ $item->path() }}">{{ $item->name }}</a></li>
    @endforeach

@stop