<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Les animaux</h1>
    <a href="{{route("animals-create")}}">Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>N*</th>
                <th>Nom</th>
                <th>Cry</th>
                <th>Age</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal )   
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->cry }}</td>
                <td>{{ $animal->age }}</td>
                <td><img style="width:10rem;height:10rem;" src="{{ asset("storage/animals/".$animal->image) }}" alt=""></td>
                <td>
                    <a href="{{route("animals-show",$animal->id)}}">Voir</a>
                    <a href="{{ route('animals-edit',$animal->id) }}">Modifier</a>
                    <form action="{{ route("animals-delete",$animal->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Supprimer</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
