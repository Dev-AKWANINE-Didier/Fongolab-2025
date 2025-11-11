<style>
.article{
    transition: box-shadow .3s ease;
    cursor: pointer;
}
.article:hover{
   box-shadow: 0px 0px 10px  #13121411; 
}
</style>

@extends("admin.base")
@section("title",'Dashboard')
@section('content')  
<section class="py-10">
  <div class="max-w-6xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">Bienvenue, Cher </h1>
    <p class="text-gray-600 text-lg mb-10 text-center">Voici un aperçu rapide de votre tableau de bord.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Carte Categorie -->
      <div class="bg-[#e0e4ebeb] article article-1 border-1 border-[#ffffff36] shadow rounded-xl p-6 border-l-4 border-l-blue-600">
        <h2 class="text-xl font-semibold text-blue-700 mb-2"><i class="fa-solid fa-list mr-2"></i>Catégories</h2>
        <p class="text-gray-600 text-sm">Les informations sur les catégories</p>
        <a href="{{ route('dashboard-category-index') }}" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lister les catégories</a> <br>
        <a href="{{ route('dashboard-category-create') }}" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Créer une catégorie</a>
      </div>

      <!-- Carte Produits -->
      <div class="bg-[#e0e4ebeb] article article-2 border-1 border-[#ffffff36] shadow rounded-xl p-6 border-l-4 border-l-green-600">
        <h2 class="text-xl font-semibold text-green-700 mb-2 "><i class="fa-solid fa-box mr-2"></i>Produits</h2>
        <p class="text-gray-600 text-sm">Les informations sur les produits</p>
        <a href="{{ route('dashboard-products-index') }}" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lister les produits</a> <br>
        <a href="" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Créer un produit</a>
      </div>

      <!-- Carte Articles -->
      <div class="bg-[#e0e4ebeb] article article-4 border-1 border-[#ffffff36] shadow rounded-xl p-6 border-l-4 border-l-yellow-500">
        <h2 class="text-xl font-semibold text-yellow-600 mb-2"><i class="fa-solid fa-file-lines mr-2"></i>Articles</h2>
        <p class="text-gray-600 text-sm">Voir les informations sur les articles</p>
        <a href="" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lister les catégories</a> <br>
        <a href="" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Créer une catégorie</a>
      </div>

      <!-- Carte Utilisateurs -->
      <div class="bg-[#e0e4ebeb] article article-3 border-1 border-[#ffffff36] shadow rounded-xl p-6 border-l-4 border-l-purple-600">
        <h2 class="text-xl font-semibold text-purple-700 mb-2"><i class="fa-solid fa-users mr-2"></i> Utilisateurs</h2>
        <p class="text-gray-600 text-sm">Consultez les utilisateurs</p>
            <a href="" class="text-sm text-purple-600 hover:underline mt-2 inline-block">Les administrateurs</a> <br>
            <a href="{{ route('dashboard-user-index') }}" class="text-sm text-purple-600 hover:underline mt-2 inline-block">Les utilisateurs</a>
      </div>
    </div>
  </div>
</section>
@endsection

