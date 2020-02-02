@extends('layout')

@section('content')

    <div class="row mt-3">
        <div class="col">
            <h1>Meal Types</h1>
        </div>

        <div class="col text-right">
            <a href="{{ route('meal-types.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
        @foreach($mealTypes as $mealType)
            <tr>
                <th scope="row">{{ $mealType->id }}</th>
                <td>{{ $mealType->name }}</td>
                <td>

                    @unless($loop->first)
                        <a href="{{ route('meal-types.swap', ['mealType' => $mealType->id, 'with' => $mealTypes[$loop->index-1]->id]) }}"><i class="fa fa-arrow-up"></i></a>
                    @endunless
                    @unless($loop->last)
                            <a href="{{ route('meal-types.swap', ['mealType' => $mealType->id, 'with' => $mealTypes[$loop->index+1]->id]) }}"><i class="fa fa-arrow-down"></i></a>
                    @endunless

                        <a href="{{ route('meal-types.edit', [$mealType]) }}" class="text-white btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>


                    @if(count($mealType->meals) == 0)
                    <form method="POST" action="{{ route('meal-types.destroy', [$mealType]) }}" class="d-inline" onsubmit="return confirm('Do you really want to delete it ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" ></i></button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
