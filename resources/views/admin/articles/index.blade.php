@extends("admin.base")
@section("title","Lister")
@section("content")
    <section class="py-10 bg-transparent min-h-screen">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> 
    <div class="flex lg:flex-row flex-col lg:justify-between">
        <section>
            <a href="" 
               class="inline-flex items-center gap-1 bg-blue-100 text-[#4c11bb]  text-xs font-medium px-3 py-1 rounded-full hover:bg-blue-200 transition">
              <i class="fa-solid fa-left-long"></i>
            </a>
        </section>
        <div class="lg:mb-8 mb-3 w-full">
              <h1 class="text-3xl font-bold bg-gradient-to-r from-[#5406e6] via-[#4c11bb ] to-[#320fdc] bg-clip-text text-transparent md:mb-4  text-center underline-offset-4">
                Les articles
              </h1>
        </div>
        <section class="flex h-[2rem] gap-4 justify-center mb-4 md:mb-4">
            <!-- Bouton Ajouter -->
              <a href="{{ route('dashboard-articles-create') }}"
                 class="inline-flex items-center gap-2 bg-gradient-to-r from-[#5406e6] via-[#4c11bb ] to-[#320fdc]  text-white text-sm  hover:opacity-[0.9] font-medium py-2 px-4 rounded-lg shadow transition-opacity">
                <!-- Icône + -->
                <i class="fa-solid fa-plus"></i>
                Ajouter
              </a>
        </section>
    </div>
    <!-- Tableau -->
    <div class="overflow-auto shadow  ">
      <table class="min-w-full divide-y divide-[#ffffff36] text-sm bg-[#4747480f] border-1 border-[#ffffff36]">
        <thead class=" bg-[#12141a35] font-semibold">
          <tr>
            <th class="px-4 py-3 text-center border">N°</th>
            <th class="px-4 py-3 text-center border">Nom</th>
            <th class="px-4 py-3 text-center border">Slug</th>
            <th class="px-4 py-3 text-left border">Prix</th>
            <th class="px-4 py-3 text-left border">Quantité</th>
            <th class="px-4 py-3 text-left border">Produit</th>
            <th class="px-4 py-3 text-left border">Statut</th>
            <th class="px-4 py-3 text-center border">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#ffffff36]">
          @foreach ($articles as $article )
          <tr class="hover:bg-[#12141a35] transitio">
            <td class="px-4 py-3 text-center border">{{ $loop->iteration }}</td>
            <td class="px-4 py-3 text-left border font-mono ">{{ $article->name }}</td>
            <td class="px-4 py-3 text-left border font-mono ">{{ $article->slug }}</td>
            <td class="px-4 py-3 text-left border">{{ $article->price }} $</td>
            <td class="px-4 py-3 text-left border">{{ $article->stock }}</td>
            <td class="px-4 py-3 text-left border">{{ $article->product->name }}</td>
            <td class="px-4 py-3 text-left border">@if ($article->status == 1)
              Disponible
              @else
              Indisponible
            @endif
          </td>
            <td class="px-4 py-3 text-center border">
              <div class="flex items-center justify-center space-x-2">
                    <!-- Voir -->
                    <a href="" class="text-blue-600 hover:text-blue-800" title="Voir">
                      <i class="bi bi-eye"></i>
                    </a>
                    <!-- Éditer -->
                    <a href="{{ route('dashboard-articles-edit',$article->id) }}" class="text-yellow-500 hover:text-yellow-600" title="Éditer">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <!-- Supprimer -->
                    <form action="{{ route('dashboard-articles-delete',$article->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="cursor-pointer text-red-600 hover:text-red-700" title="Supprimer">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
