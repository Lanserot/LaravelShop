@extends('master')
@section('title', 'Продукт')
@section('content')
    <p>Наиминование : {{$product->name}}</p>
    <p>Описание : {{$product->description}}</p>
    <img src="/resources/images/products/{{$product->image}}" alt="">
    <p>Кол-во на складе : {{$product->count}}</p>
    <p>Цена : {{$product->price}} руб.</p>
    <a href="/{{$category->code}}"> {{$category->name}}</a>
    <form action="{{ route('basket-add', $product) }}" method="post">
        @csrf
        <input type="submit" class="btn btn-info" value="В конзину">
    </form>
@endsection
