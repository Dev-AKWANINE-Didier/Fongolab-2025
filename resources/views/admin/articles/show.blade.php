@extends("admin.base")
@section("title","Detail")
@section("content")
    <h1>{{ $article->name }}</h1>
    <h1>Produit{{ $article->product->name }}</h1>

    <div  style="width: 10rem; height:10rem">
        <img class="w-full h-full" src="{{ asset("storage/images/".$article->image) }}" alt="">
    </div>
@endsection
