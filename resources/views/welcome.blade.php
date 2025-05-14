@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Nos produits</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->description }}</p>
                        <p><strong>{{ $product->price }} €</strong></p>
                        <p>Stock : {{ $product->stock }}</p>

                        @if($product->stock > 0)
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-success">Ajouter au panier</a>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>Indisponible</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('cart.view') }}" class="btn btn-primary">Voir le panier</a>
</div>
@endsection
