@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
    <div class="product-side">
        <h2 class="product-side__title">商品一覧</h2>
        <div class="product-side__form">
            <form class="product-side__form__search" action="{{ route('products.index') }}" method="GET">
                @csrf
                <input class="product-side__form__search--input" type="text" name="keyword" value="{{ $keyword ?? '' }}"
                    placeholder="商品名で検索">
                <button class="product-side__form__search--button" type="submit">検索</button>
                <div class="product-side__select">
                    <h3 class="product-side__select--title">価格順で表示</h3>
                    <select class="product-side__select--input" name="sort" onchange="this.form.submit()">
                        <option value="">価格で並び替え</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>低い順に表示</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>高い順に表示</option>
                    </select>
            </form>
        </div>
    </div>
    </div>
    <div class="product-content">
        <form class="protect-content__add">
            <a href="{{ route('products.create') }}" class="product-content__form__button">＋商品を追加</a>
        </form>
        <div class="product-content__items">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="product-content__items--item">
                    <img class="product-content__items--item--img" src="{{ asset($product->image_path) }}" alt="商品画像">
                    <h3 class="product-content__items--item--name">{{ $product->name }}</h3>
                    <p class="product-content__items--item--price">{{ $product->price }}</p>
                </a>
            @endforeach

            <!-- ページネーションのリンクを表示 -->
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
