@extends('master')
@section('title', 'Все товары')
@section('content')
    <h1>Главная</h1>
    <div class="row">
        @foreach($products as $product)
            @include('card', compact('product'))
        @endforeach
    </div>
@endsection

