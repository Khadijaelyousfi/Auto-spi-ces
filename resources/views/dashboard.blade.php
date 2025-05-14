<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Store - Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #2c2c2c, #434343);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f1f1f1;
        }
        .dashboard-container {
            background: rgba(50, 50, 50, 0.1);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
        }
        .dashboard-title {
            font-weight: 700;
            font-size: 30px;
            text-align: center;
            margin-bottom: 30px;
            color: #e0e0e0;
        }
        .menu-link {
            display: block;
            background: #3a3a3a;
            border: 1px solid #5c5c5c;
            border-radius: 12px;
            padding: 15px 25px;
            margin: 12px 0;
            font-size: 18px;
            color: #f1f1f1;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .menu-link:hover {
            background: #5c5c5c;
            color: #ffc107;
            text-decoration: none;
        }
    </style>
</head>
<body>
@extends('layout')

@section('content')
<div class="container dashboard-container">
    <h2 class="dashboard-title">Tableau de bord Admin</h2>
    <a href="{{ route('products.index') }}" class="menu-link">📦 Gérer les produits</a>
    <a href="{{ route('categories.index') }}" class="menu-link">🗂️ Gérer les catégories</a>
    <a href="{{ route('orders.index') }}" class="menu-link">🧾 Voir les commandes</a>
</div>
@endsection
</body>
</html>
