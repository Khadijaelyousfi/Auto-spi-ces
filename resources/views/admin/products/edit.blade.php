<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo.jpg') }}">
    <title>Auto pièces Market</title>
</head>
<body>
@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Modifier le produit</h2>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Changer l’image</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        @if($product->image)
            <p>Image actuelle :</p>
            <img src="{{ asset('storage/products/' . $product->image) }}" width="120" alt="image">
        @endif

        <button type="submit" class="btn btn-secondary">Mettre à jour</button>
    </form>
</div>
@endsection

</body>
</html>