@extends('layout')

@section('content')
    <div class="row">

        <div class="col-md-6 col-md-offset-3">


            <h3>{{ $item->name }}</h3>

            <div>
                <ul class="list-group">
                    @foreach ($item->reviews as $review)
                        <li class="list-group-item">
                            <a class="pull-left" href="/review/{{ $review->id }}">{{ $review->body }}</a>
                            <a class="pull-right" href="#">{{ $review->user->name  }}</a>
                            <div class="clearfix"></div>
                        </li>
                    @endforeach
                </ul>
            </div>


            <h3> Add a New Review</h3>

            <form method="post" action="/review">

                {{ csrf_field() }}
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="form-group">

                    <textarea class="form-control" name="body">{{ old('body') }}</textarea>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="Add Review">

                </div>

            </form>
            @if (count($errors))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>

@stop