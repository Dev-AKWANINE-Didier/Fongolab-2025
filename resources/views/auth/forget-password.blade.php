<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/forgot-password" method="POST">
        @csrf
        <input type="text" name="email" id="email">
        @error("email")
            <p class="text-red-500">{{ $message }}</p>
        @enderror

@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
        <button type="submit">Valider</button>
    </form>
</body>
</html>
