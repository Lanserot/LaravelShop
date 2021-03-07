@extends('master')
@section('title', 'Категория ' . $category->name)
@section('content')
    <a href="/categories">Категории </a>
    <h1>{{$category->name}} {{$category->products->count()}}</h1>
    <div class="row">
        @foreach($category->products as $product)
            @include('card', compact('product'))
        @endforeach
    </div>
    <h3>{{$category->description}}</h3>

@endsection
