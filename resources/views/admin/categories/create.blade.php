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
    <h2>Ajouter une catégorie</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-secondary">Ajouter</button>
    </form>
</div>
@endsection

</body>
</html>
