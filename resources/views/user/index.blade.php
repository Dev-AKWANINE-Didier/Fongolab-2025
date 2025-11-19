<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour
        @if(auth()->check())
          {{ auth()->user()->name }}
        @else
          Utilisateur
        @endif
    </h1>

    <form action="{{ route("logout") }}" method="POST">
          @csrf
        <button type="submit" class="cursor-pointer block text-red-600 hover:text-red-800 transition duration-300">
            <i class="fa-solid fa-right-from-bracket menu-icon" style="text-decoration: none;"></i>Déconnexion
        </button>
    </form>
    
</body>
</html>