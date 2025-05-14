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
    <h2>Commandes reçues</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom client</th>
                <th>Total</th>
                <th>Date</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->total_price }} DH</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-light">Voir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>