@extends('master')
@section('title', 'Корзина')
@section('content')
    <h1>Корзина</h1>
    <div class="row">
        @foreach($order->products as $product)
            <div class="col-lg-3">
                <div style="border: 1px solid black; border-radius: 5px; padding: 5px;" align="center">
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a>
                    <img src="/resources/images/products/{{$product->image}}" style="max-height: 150px" alt="">
                    <p>Цена : {{$product->price}} руб.</p>
                    <p>На складе : {{$product->count}}</p>
                    <div>
                        <form action="{{route('basket-add', $product)}}" method="post" style="display: inline">
                            @csrf
                            <button type="submit" class="btn btn-success">+</button>
                        </form>
                        <form action="{{route('basket-del', $product)}}" method="post" style="display: inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">-</button>
                        </form>
                    </div>

                    <p>{{$product->pivot->count}} шт - {{$product->getPriceForCount()}} руб</p>
                </div>
            </div>
        @endforeach
        <p>Общая цена : {{$order->getFullPrice()}}</p>
            <a href="{{route('basket-place')}}" class="btn btn-info">Оформить</a>
    </div>
@endsection

