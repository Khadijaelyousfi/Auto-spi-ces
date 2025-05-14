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
    <h2>Liste des produits</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                @if($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" width="60" alt="image">
                @else
                    -
                @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'Aucune' }}</td>
                <td>{{ $product->price }} DH</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer ce produit ?')" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>