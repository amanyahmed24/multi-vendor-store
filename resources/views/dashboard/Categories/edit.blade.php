@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $category->name }}">
        @error('name')
        <div class="text-danger">
         {{ $message }}
        </div>
     @enderror
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control" value="{{old('description' ,$category->description ) }}">
        
        <br><br>

        <label for="parent">Parent</label>

        <select name="parent_id" class="form-control">
            <option value="">main category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>
                    {{ $parent->name }}</option>
            @endforeach

        </select>
        @error('parent_id')
        <div class="text-danger">
         {{ $message }}
        </div>
     @enderror
        <br><br>

        <label for="image">Image</label>
    
        @if ($category->image)
            <img src="{{ asset("storage/$category->image") }}" 
            width="175px" alt="Current Image">
        @endif
        <br><br>
        <label for="newImage">Update Image</label>
        <input type="file" name="image" id="newImage" class="form-control">
        @error('image')
        <div class="text-danger">
         {{ $message }}
        </div>
     @enderror
        <br><br>

        <input type="submit" value="Save" class="btn btn-outline-success"
        style="margin: auto ; width : fit-content ; display :block">
        
    </form>
@endsection
