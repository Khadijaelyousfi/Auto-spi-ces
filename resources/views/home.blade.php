@extends('layout')

@section('content')
<div style="background-color: #808080; min-height: 100vh;">
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Texte -->
            <div class="col-md-6 text-white">
                <h1 class="mb-4 text-center"><strong>Bienvenue à <br> Auto pièce Market</strong></h1>
                <p class="mb-4">
                Trouvez vos pièces auto facilement et au meilleur prix !
                Bienvenue sur notre site spécialisé dans la vente de pièces détachées pour voitures. Nous mettons à votre disposition un large catalogue de pièces neuves et d’occasion, compatibles avec toutes les marques et modèles.
                Que vous soyez bricoleur ou professionnel, commandez en quelques clics et recevez vos pièces rapidement, avec un service client à votre écoute.

                <strong class="text-center">Rapide. Fiable. Économique.</strong>
                </p>
                <a href="{{ route('products.byCategory') }}" class="btn btn-dark text-white px-4 py-2">
                    Voir les Produits
                </a>
            </div>

            <!-- Image -->
            <div class="col-md-6 text-center mt-4 mt-md-0">
                <img
                    src="logo2.jpg"
                    alt="Café"
                    class="img-fluid rounded"
                    style="max-width: 100%;"
                />
            </div>
        </div>
    </div>
</div>
@endsection
