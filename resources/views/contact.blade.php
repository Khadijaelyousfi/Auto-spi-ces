@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4"><strong>Contactez-nous</strong></h2>
    <p class="mb-4 text-center">Nous serions ravis de vous entendre ! Voici nos informations de contact :</p>

    <form onsubmit="envoyerEmail(); return false;">
        <div class="form-group">
            <label>Votre nom</label>
            <input type="text" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Votre email</label>
            <input type="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Votre message</label>
            <textarea id="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">✉ Envoyer le message</button>
    </form>
</div>
<div class="mt-5">
    <h5 class="mb-3 text-center">Autres moyens de nous contacter :</h5>
    <ul class="list-unstyled">
        <li><strong>Email :</strong> <a href="mailto:elyousfikhadeeja08@gmail.com" class="text-dark">autopieces.market@gmail.com</a></li>
        <li><strong>Téléphone :</strong> <a href="tel:+212626109369" class="text-dark">+212 6 26 10 93 69</a></li>
        <li><strong>Instagram :</strong> <a href="https://instagram.com/khadijaelyousfi8" class="text-dark" target="_blank">Khadija Elyousfi</a></li>
        <li><strong>Facebook :</strong> <a href="https://facebook.com/ta.page" class="text-dark" target="_blank">Khadija Elyousfi</a></li>
    </ul>
</div>

<script>
function envoyerEmail() {
    const nom = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    const sujet = encodeURIComponent("Message de " + nom);
    const corps = encodeURIComponent("Nom: " + nom + "\nEmail: " + email + "\n\nMessage:\n" + message);

    // Remplace l’adresse ci-dessous par ton adresse email
    window.location.href = `mailto:elyousfikhadeeja08@gmail.com?subject=${sujet}&body=${corps}`;
}
</script>
@endsection
