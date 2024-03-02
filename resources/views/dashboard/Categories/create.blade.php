@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
       
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control"
        value="{{ old('name') }}">
        @error('name')
        <div class="text-danger">
         {{ $message }}
        </div>
     @enderror
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control"
        value="{{ old('description') }}">
        <br><br>

        <label>Parent Category</label>

        <select name="parent-_id" class="form-control">
            <option value="">main category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id | old('parent_id') }} ">{{ $parent->name }}</option>
            @endforeach

        </select>

        @error('parent_id')
           <div class="text-danger"> {{ $message }}</div>
        @enderror
        <br><br>

        @error('image')
        <div class="text-danger"> {{ $message }}</div>

        @enderror
        <label for="image">Image</label>

        <input type="file" name="image" id="image" class="form-control">

        <br><br>


        <input type="submit" value="Add" class="btn btn-outline-success">
    </form>
@endsection
