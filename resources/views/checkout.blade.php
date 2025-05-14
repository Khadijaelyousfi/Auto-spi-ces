@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Finaliser votre commande</h2>

    @php
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    @endphp

    <div class="alert alert-info">
        <strong>Total de la commande :</strong> {{ $total }} DH <br>
        <small> Livraison gratuite ✅</small>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('checkout.submit') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nom complet</label>
            <input type="text" class="form-control" name="name" required placeholder="Votre nom">
        </div>

        <div class="form-group">
            <label for="phone">Téléphone (optionnel)</label>
            <input type="text" class="form-control" name="phone" placeholder="+32...">
        </div>

        <div class="form-group">
            <label for="address">Adresse de livraison</label>
            <textarea class="form-control" name="address" required placeholder="Rue, ville, code postal..."></textarea>
        </div>

        <div class="alert alert-info">
            <strong> Paiement à la livraison.</strong>
        </div>
        
        <button type="submit" class="btn btn-secondary btn-lg mt-3">Confirmer la commande</button>
    </form>
</div>
@endsection
