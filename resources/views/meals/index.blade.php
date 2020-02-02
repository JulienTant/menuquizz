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

            <div class="col text-right">
                <a href="{{ route('meals.create', ['meal_type_id' => $mealType->id]) }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($mealType->meals as $meal)
                <tr>
                    <th scope="row">{{ $meal->id }}</th>
                    <td>{{ $meal->name }}</td>
                    <td>
                        <a href="{{ route('meals.edit', [$meal]) }}" class="text-white btn btn-info btn-sm"><i
                                class="fa fa-pencil"></i></a>

                        <form method="POST" action="{{ route('meals.destroy', [$meal]) }}" class="d-inline" onsubmit="return confirm('Do you really want to delete it ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" ></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">It's empty here...</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endforeach

@endsection
