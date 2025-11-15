<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $animal->name }}</h1>
    <h1>{{ $animal->cry }}</h1>
    <h1>{{ $animal->age }}</h1>
    <img style="width:10rem;height:10rem;" src="{{ asset("storage/animals/".$animal->image) }}" alt="">
</body>
</html>