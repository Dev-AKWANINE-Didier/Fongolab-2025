<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Creation de l'animal</h1>

    <form action="{{ route("animals-store") }}" method="post" enctype="multipart/form-data" >
        @csrf
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ old("name") }}" placeholder="Nom de l'animal">
        @error("name")
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="cry">Cri</label>
        <input type="text" name="cry" id="cry" value="{{ old("cry") }}" placeholder="Cri de l'animal">
        @error("cry")
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" value="{{ old("age") }}" placeholder="Age de l'animal">
        @error("age")
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" placeholder="image de l'animal">
        @error("image")
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Enregistrer</button>
    </div>
    </form>
</body>
</html>