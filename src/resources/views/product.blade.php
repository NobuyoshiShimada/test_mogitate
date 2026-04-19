@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
    <div class="product-side">
        <h2 class="product-side__title">商品一覧</h2>
        <div class="product-side__form">
            <form class="product-side__form__search" action="" method="GET">
                @csrf
                <input class="product-side__form__search--input" type="text" placeholder="商品名で検索" name="search">
                <button class="product-side__form__search--button">検索</button>
            </form>
            <div class="product-side__select">
                <h3 class="product-side__select--title">価格順で表示</h3>
                <select class="product-side__select--input" name="select" id="" placeholder="価格で並び替え">
                    <option value="" class="">高い順に表示</option>
                    <option value="" class="">低い順に表示</option>
                </select>
            </div>
        </div>
    </div>
    <div class="product-content">
        <form class="protect-content__form">
            @csrf
            <button class="product-content__form__button" action="/products/register">＋商品を追加</button>
        </form>
        <div class="product-content__items">
            @foreach ($products as $product)
                <div class="product-content__items--item">
                    <img class="product-content__items--item--img" src="{{ asset($product->image_path) }}" alt="商品画像">
                    <h3 class="product-content__items--item--name">{{ $product->name }}</h3>
                    <p class="product-content__items--item--price">{{ $product->price }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
