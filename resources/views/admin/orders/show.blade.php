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
    <h2>Détail de la commande</h2>

    <p><strong>Nom :</strong> {{ $order->customer_name }}</p>
    <p><strong>Téléphone :</strong> {{ $order->customer_phone }}</p>
    <p><strong>Adresse :</strong> {{ $order->customer_address }}</p>
    <p><strong>Total :</strong> {{ $order->total_price }} DH</p>

    <h4 class="mt-4">Produits commandés :</h4>
    <table class="table table-sm table-bordered">
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
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->price }} DH</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price * $item->quantity }} DH</td>
                    <td><a href="{{ route('orders.pdf', $order->id) }}" class="btn btn-sm btn-light mt-2">📄 Télécharger PDF</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-light">Retour aux commandes</a>
</div>
@endsection

</body>
</html>