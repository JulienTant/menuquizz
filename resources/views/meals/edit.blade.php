@extends('layout')

@section('content')

    <form method="POST" action="{{ route('meals.update', [$meal]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="group_id">Group</label>
            <select class="form-control @error('group_id')is-invalid @enderror" id="group_id" name="group_id">
                <option value="">SELECT A GROUP</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ old('group_id', $meal->group_id) == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="meal_type_id">Type</label>
            <select class="form-control  @error('meal_type_id')is-invalid @enderror" id="meal_type_id" name="meal_type_id">
                <option value="">SELECT A TYPE</option>
                @foreach($mealTypes as $mealType)
                    <option value="{{ $mealType->id }}" {{ old('meal_type_id', $meal->meal_type_id) == $mealType->id ? 'selected' : ''}}>{{ $mealType->name }}</option>
                @endforeach
            </select>
            @error('meal_type_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name', $meal->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control @error('content')is-invalid @enderror" rows="10">{{ old('content', $meal->content) }}</textarea>
            @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control @error('comment')is-invalid @enderror">{{ old('comment', $meal->comment) }}</textarea>
            @error('comment')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
