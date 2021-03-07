@extends('master')
@section('title', 'Офрмить')
@section('content')
    <h1>Корзина</h1>
    <div class="row">
        {{ $order->getFullPrice() }}
        <form action="{{ route('basket-confirm') }}" method="post">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Имя">
            <input type="text" class="form-control" placeholder="Email">
            <input type="text" name="phone" class="form-control" placeholder="Телефон">
            <button class="btn btn-success">Подтвердить заказ</button>
        </form>
    </div>
@endsection

