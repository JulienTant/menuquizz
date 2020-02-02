@extends('layout')

@section('content')

    <div class="row mt-3">
        <div class="col">
            <h1>Meals</h1>
        </div>
    </div>

    @foreach($mealTypes as $mealType)
        <div class="row mt-3">
            <div class="col">
                <h2>{{ $mealType->name }}</h2>
            </div>

        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Comment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mealType->meals as $meal)
                <tr>
                    <th scope="row">{{ $meal->id }}</th>
                    <td>{{ $meal->name }}</td>
                    <td>
                        <textarea class="form-control" readonly>{{ $meal->comment }}</textarea>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach

@endsection
