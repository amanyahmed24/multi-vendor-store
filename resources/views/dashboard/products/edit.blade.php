@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control"
        value="{{ $product->name }}">
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control"
        value="{{ $product->description }}">
        <br><br>

        <label for="parent">Category</label>
        <input type="number" name="category" id="category" class="form-control"
        value="{{ $product->category }}">
        
        <label for="parent">Price</label>
        <input type="number" name="price" id="parent" class="form-control"
        value="{{ $product->price }}">
        
        <br><br>

        <input type="submit" value="Save" class="btn btn-outline-success">
    </form>
@endsection
