@extends('layouts.dashboard')
@section('content')
    <h2>All Categories</h2>

    <br> <br>
   
    <a  href="{{ route('categories.create') }}" class="btn btn-outline-success">Add new category</a>
    <br><br>
    <x-alert />
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Image</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id !="" ?  $category->parent_id : "main category"  }}</td>
                    <td><img src="{{ asset("storage/$category->image") }}" alt="" width="40px"></td>
                    <td>
                        <form action="{{ route('categories.show', $category->id) }}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-outline-primary" value="Show" />
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('categories.edit', $category->id) }}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-outline-secondary" value="Edit" />
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-outline-danger" value="Delete" />
                        </form>
                    </td>


                </tr>
            @empty
                <p>No data</p>
            @endforelse
        </tbody>
    </table>
@endsection
