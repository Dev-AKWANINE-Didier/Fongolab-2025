@extends("admin.base")
@section("title",'Detail')
@section("content")
    
<section class="py-10 bg-transparent min-h-screen px-4">
 <h1>{{ $user->name }}</h1>
 <h1>{{ $user->email }}</h1>
 <h1>{{ $user->role }}</h1>
 <h1 class="font-bold text-yellow-500">Les categories</h1>
 @foreach ($user->categories as $category )
      <h1>{{ $category->name }}</h1>
      <h1 class="font-bold text-blue-500">Les produits</h1>
      @if ($category->products)
      <ul>
           @foreach ($category->products as $product)
               <li class="text-emerald-500">{{ $product->name }}</li>
           @endforeach
      </ul>
     @else
     <h1>Aucun produit</h1>
      @endif
 @endforeach
</section>
@endsection
