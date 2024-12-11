@extends('layouts.dashboard')
@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control">
        <br><br>

        <label>Category</label>

        <select name="category_id" >

            @foreach ($categories as $category)
            <option  value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
        <br><br>

        <label for="image">Image</label>

        <input type="file" name="image" id="image" class="form-control">

        <br><br>

        <label for="price">Price</label>

        <input type="number" name="price" id="price" class="form-control">

        <br><br>




        <input type="submit" value="Add" class="btn btn-outline-success">
    </form>
@endsection
