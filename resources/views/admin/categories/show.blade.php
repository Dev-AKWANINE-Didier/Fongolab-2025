@extends("admin.base")
@section("title","Detail de categorie")
@section("content")
    <h1>Nom : {{ $category->name }}</h1>
    <h1>User : {{ $category->user->name }}</h1>

    <h1>Les produits</h1>
    @foreach ($category->products as $product)
         <h1>{{ $product->name }}</h1>
         @foreach ($product->articles as $article)
             <h1>Article : {{ $article->name }}</h1>
         @endforeach
    @endforeach

@endsection
