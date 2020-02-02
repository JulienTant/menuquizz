@extends('layout')

@section('content')

    <h1>Quizz</h1>

    @foreach($meals as $meal)
        <h2>{{ $meal->name }}</h2>

        <div class="row">
            <div class="col">
                <strong>Your answer</strong>
                <textarea rows="10" class="form-control"></textarea>
            </div>

            <div class="col">
                <strong>Actual answer (CTRL+A inside to see)</strong>
                <textarea rows="10" class="form-control text-white">{{ $meal->content }}</textarea>
            </div>
        </div>

    @endforeach


@endsection
