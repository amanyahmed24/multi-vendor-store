@extends('layouts.dashboard')
@section('content')
    <h2>All Products</h2>

    <br> <br>
    <a  href="{{ route('products.create') }}" class="btn btn-outline-success">Add new product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Img</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category ?  $product->category : "main category"  }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->img }}</td>

                    <td>
                        <form action="{{ route('products.show', $product->id) }}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-outline-primary" value="Show" />
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('products.edit', $product->id) }}" method="get">
                            @csrf
                            <input type="submit" class="btn btn-outline-secondary" value="Edit" />
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
