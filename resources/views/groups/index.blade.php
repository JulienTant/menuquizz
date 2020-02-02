@extends('layout')

@section('content')

    <div class="row mt-3">
        <div class="col">
            <h1>Groups</h1>
        </div>

        <div class="col text-right">
            <a href="{{ route('groups.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
        @foreach($groups as $group)
            <tr>
                <th scope="row">{{ $group->id }}</th>
                <td>{{ $group->name }}</td>
                <td>
                    <a href="{{ route('groups.edit', [$group]) }}" class="text-white btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>

                    @if(count($group->meals) == 0)
                    <form method="POST" action="{{ route('groups.destroy', [$group]) }}" class="d-inline" onsubmit="return confirm('Do you really want to delete it ?');">
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
