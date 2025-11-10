@extends("admin.base")
@section("title",'Detail')
@section("content")
    
<section class="py-10 bg-transparent min-h-screen px-4">
 <h1>{{ $user->name }}</h1>
 <h1>{{ $user->email }}</h1>
 <h1>{{ $user->role }}</h1>
 <h1>Les categories</h1>
 @foreach ($user->categories as $category )
      <h1>{{ $category->name }}</h1>
 @endforeach
</section>
@endsection
