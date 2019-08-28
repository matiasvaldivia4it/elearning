@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            @if(Auth::user()->is_admin)
            <div class="m-2">
                <a href="/lessons/content/new" class="btn btn-primary">New Lesson</a>
            </div>
            @endif
            @foreach($lessons as $lesson)
                <div class="card">
                    <div class="card-body">
                        <div class="text-left">
                            <h1>{{$lesson->title}}</h1>
                            <p class="lesson-index-explanation">{{$lesson->explanation}}</p>
                            <div class="text-right">
                                <p>
                                    <a href="/lesson/{{$lesson->id}}/questions" class="btn btn-primary">Show Question</a>
                                    <a href="/lessons/content/{{$lesson->id}}" class="btn btn-primary">Learn</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            </div>
        </div>
    </div>

@endsection