@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center"><strong>Nos produits</strong></h2>

    @foreach($categories as $category)
        <h4 class="mt-4 text-decoration-underline"><strong>{{ $category->name }}</strong></h4>
        <div class="row">
            @forelse($category->products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            @if($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}"
                                    class="card-img-top"
                                    alt="{{ $product->name }}"
                                    style="height: 200px; object-fit: cover;">
                            @endif
                            <h5 class="text-dark"><strong>{{ $product->name }}</strong></h5>
                            <p class="text-dark">{{ $product->description }}</p>
                            <p class="text-dark"><strong>{{ $product->price }} DH</strong></p>
                            <p class="text-dark">Stock : {{ $product->stock }}</p>
                            @if($product->stock > 0)
                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity" class="text-dark">Quantité</label>
                                    <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" class="form-control form-control-sm" style="width: 80px;">
                                </div>
                                <button type="submit" class="btn btn-sm btn-secondary mt-1">Ajouter au panier</button>
                            </form>
                            @else
                                <button class="btn btn-sm btn-secondary" disabled>Indisponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="ml-3">Aucun produit disponible dans cette catégorie.</p>
            @endforelse
        </div>
    @endforeach
</div>
@endsection
