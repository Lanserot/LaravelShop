<div class="col-lg-3" style=" padding: 5px;">
    <div style="padding: 10px;border: 1px solid black; border-radius: 5px;">
        <p>{{$product->name}}</p>
        <p>{{$product->price}} руб.</p>
        <div align="center">
            <img src="/resources/images/products/{{ $product->image }}"  style="max-height: 150px">
            <form action="{{ route('basket-add', $product) }}" method="post">
                @csrf
                <input type="submit" class="btn btn-info" value="В конзину">
                <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-light">Подробнее</a>
            </form>
            <p>Остаток : {{$product->count}} ш.</p>
        </div>
    </div>


</div>
