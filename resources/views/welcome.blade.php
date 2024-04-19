<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Lien vers votre fichier CSS -->
    
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

@include('layouts.front.head')
    <h1>Welcome to our Blog</h1>
                        
        <main>
            <p>Bienvenue sur ton blog de jeux vidéo ! Explorez notre contenu passionnant et découvrez les dernières actualités, critiques de jeux, guides et bien plus encore.</p>
            <!-- Tu peux ajouter d'autres éléments ici comme des articles en vedette, des images attrayantes, etc. -->
        </main>
@include('layouts.front.footer')
