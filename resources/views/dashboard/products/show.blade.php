@extends('layouts.dashboard')
@section('content')

<div class="card">
    <h2> Details of Product : {{ $product->name }}</h2>
    <br><br>

    <p>
       Name :: {{ $product->name }}
    </p>
    <p>
        
        Description :: {{ $product->description }}</p>
    <p>
        
        category :: {{ $product->category->name }}</p>
</div>

<br><br>

<a href="{{ route('products.index') }}">Return to all Products</a>
@endsection