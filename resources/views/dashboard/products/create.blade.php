@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control">
        <br><br>

        <label>Category</label>

        <select>

            @foreach ($categories as $category)
            <option name="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
        <br><br>


        <input type="submit" value="Add" class="btn btn-outline-success">
    </form>
@endsection
