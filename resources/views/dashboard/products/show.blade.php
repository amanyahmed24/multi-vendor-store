@extends('layouts.dashboard')
@section('content')

<div class="card">
    <h2> Details of category : {{ $category->name }}</h2>
    <br><br>

    <p>
       Name :: {{ $category->name }}
    </p>
    <p>
        
        Description :: {{ $category->description }}</p>
    <p>
        
        Parent :: {{ $category->parent }}</p>
</div>

<br><br>

<a href="{{ route('categories.index') }}">Return to all categories</a>
@endsection