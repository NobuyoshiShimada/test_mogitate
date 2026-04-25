@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
@endsection
@section('content')
    <div class="product-detail">
        <nav class="breadcrumb">
            <a href="{{ route('products.index') }}">商品一覧</a> ＞ {{ $product->name }}
        </nav>

        <form class="product-detail__form"action="{{ route('products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="product-detail__main">
                <div class="product-detail__image-section">
                    <div class="image-preview">
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                    </div>
                    <input type="file" name="image" class="image-upload">
                    @error('image')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="product-detail__info-section">
                    <div class="product-detail__name">
                        <label>商品名</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="product-detail__price">
                        <label>値段</label>
                        <input type="text" name="price" value="{{ old('price', $product->price) }}"
                            placeholder="値段を入力">
                        @error('price')
                            <p class="error-message">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="product-detail__season">
                        <label>季節</label>
                        <div class="checkbox-group">
                            @foreach ($seasons as $season)
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                    id="season-{{ $season->id }}" class="checkbox-input"
                                    {{ (is_array(old('seasons')) && in_array($season->id, old('seasons'))) || (isset($product) && $product->seasons->contains($season->id)) ? 'checked' : '' }}>
                                <label for="season-{{ $season->id }}" class="checkbox-label">
                                    {{ $season->name }}
                                </label>
                            @endforeach
                            @error('seasons')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>

            <div class="product-detail__description">
                <label>商品説明</label>
                <textarea name="description" rows="12">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            </div>

            <div class="product-detail__actions">
                <a href="{{ route('products.index') }}" class="button-back">戻る</a>
                <button type="submit" class="button-submit">変更を保存</button>
            </div>
        </form>

        <form class="delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="button-delete" type="submit" onclick="return confirm('本当に削除しますか？')">
                <span class="material-symbols-outlined">
                    delete
                </span> </button>
        </form>
    </div>
@endsection
