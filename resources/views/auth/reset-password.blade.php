<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/reset-password" method="POST">
        @csrf
        <input type="text" name="token"  hidden value="{{ request()->route('token') }}">
        
        <input type="text" placeholder="Votre email" name="email" id="email">
        @error("email")
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Votre mot de passe" name="password" id="password">
        @error("password")
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        <input type="text" name="password_confirmation" placeholder="Confirmer" id="password_confirmation">
        @error("password_confirmation")
            <p class="text-red-500">{{ $message }}</p>
        @enderror

        @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
