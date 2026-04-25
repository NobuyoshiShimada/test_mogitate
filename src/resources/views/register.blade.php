@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register">
        <h2 class="register__title">商品登録</h2>

        <form class="register__form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- 商品名 --}}
            <div class="register__form-group">
                <label>商品名<span class="label-required">必須</span></label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- 値段 --}}
            <div class="register__form-group">
                <label>値段<span class="label-required">必須</span></label>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                @error('price')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- 商品画像 --}}
            <div class="register__form-group">
                <label>商品画像<span class="label-required">必須</span></label>
                <input type="file" name="image">
                @error('image')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- 季節 --}}
            <div class="register__form-group">
                <label>季節<span class="label-required">必須</span>
                    <span class="label-note">複数選択可</span></label>
                <div class="checkbox-group">
                    @foreach ($seasons as $season)
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}" id="season-{{ $season->id }}"
                            class="checkbox-input"
                            {{ (is_array(old('seasons')) && in_array($season->id, old('seasons'))) || (isset($product) && $product->seasons->contains($season->id)) ? 'checked' : '' }}>
                        <label for="season-{{ $season->id }}" class="checkbox-label">
                            {{ $season->name }}
                        </label>
                    @endforeach
                </div>
                @error('seasons')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- 商品説明 --}}
            <div class="register__form-group">
                <label>商品説明<span class="label-required">必須</span></label>
                <textarea name="description" rows="5" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                @error('description')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register__form-actions">
                <a href="{{ route('products.index') }}" class="button__back">戻る</a>
                <button type="submit" class="button__register">登録</button>
            </div>
        </form>
    </div>
@endsection
