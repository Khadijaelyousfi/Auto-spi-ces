@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center"><strong>Votre panier</strong></h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }} DH</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] * $item['quantity'] }} DH</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Voulez-vous supprimer ce produit ?')">🗑 Supprimer</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>{{ $total }} DH</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="text-right mt-3">
            <a href="{{ route('checkout.form') }}" class="btn btn-lg btn-success">✅ Valider la commande</a>
        </div>
    @else
        <p>Votre panier est vide.</p>
        <a href="{{ route('products.byCategory') }}" class="btn btn-primary">Retour aux produits</a>
    @endif
</div>
@endsection
