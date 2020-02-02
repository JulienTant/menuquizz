@extends('layout')

@section('content')

    <h1>Quizz</h1>

    <quizz :meals='@json($meals)'></quizz>

@endsection
