@extends('master')
@section('title', 'Категории')
@section('content')
    <div class="row">
        @foreach($categories as $item)
            <div class="col-lg-4" align="center">
                <img src="/resources/images/categories/{{$item->image}}" style="max-height: 300px" alt="">
                <a href="{{route('category', $item->code)}}">
                    {{$item->name}}
                </a> <br>
                <p>{{$item->description}}</p>
            </div>
        @endforeach
    </div>
@endsection
