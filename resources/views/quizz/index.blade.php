@extends('layout')

@section('content')

    <h1>Quizz generator</h1>

    <a class="btn btn-outline-dark" href="{{ route('quizz.create', ['from' => 'all']) }}">With 10 random meals</a>

    <h2 class="mt-2">By Group</h2>
    <ul>
    @foreach($groups as $group)
        <li><a class="btn btn-outline-dark" href="{{ route('quizz.create', ['from' => 'group:' . $group->id]) }}">{{ $group->name }}</a></li>
    @endforeach
    </ul>

    <h2 class="mt-2">By Meal type</h2>
    <ul>
    @foreach($mealTypes as $mealType)
        <li><a class="btn btn-outline-dark" href="{{ route('quizz.create', ['from' => 'meal_type:' . $mealType->id]) }}">{{ $mealType->name }}</a></li>
    @endforeach
    </ul>
@endsection
