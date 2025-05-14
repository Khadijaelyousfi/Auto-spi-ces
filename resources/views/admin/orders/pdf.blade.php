<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('logo.jpg') }}">
    <title>Auto pièces Market</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2 { margin-bottom: 0; }
    </style>
</head>
<body>

    <h2>Commande #{{ $order->id }}</h2>
    <p><strong>Nom client :</strong> {{ $order->customer_name }}</p>
    <p><strong>Téléphone :</strong> {{ $order->customer_phone }}</p>
    <p><strong>Adresse :</strong> {{ $order->customer_address }}</p>
    <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <h3>Produits commandés :</h3>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->price, 2) }} Dh</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} DH</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>{{ number_format($order->total_price, 2) }} DH</strong></td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 30px;"><em>Paiement à la livraison. Livraison gratuite.</em></p>

</body>
</html>
