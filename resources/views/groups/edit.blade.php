@extends('layout')

@section('content')

    <form method="POST" action="{{ route('groups.update', [$group]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name', $group->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
