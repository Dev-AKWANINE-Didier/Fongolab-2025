@extends("admin.base")
@section("title","Creation des articles")
@section("content")
    <!-- CSS Animations -->
<style>
  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-6px);
    }
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.95);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-bounce-slow {
    animation: bounce 2.5s infinite;
  }

  .animate-fade-in {
    animation: fadeIn 0.8s ease-in-out;
  }
</style>

<main class="w-full   min-h-screen px-4 bg-transparent">
    <div class="mt-[1rem]">
      <a href="" class="inline-flex items-center gap-1 bg-blue-100 text-[#4c11bb] text-xs font-medium px-3 py-1 rounded-full hover:bg-blue-200 transition"><i class="fa-solid fa-left-long"></i></a>
    </div>
    <article class="w-full flex items-center justify-center  min-h-screen px-4 bg-transparent">
      <section class="w-full article max-w-md bg-transparent rounded-xl shadow-lg p-6 sm:p-8 border-[#0c0c0d05] border animate-fade-in ">
          <!-- En-tête -->
          <header class="text-center mb-6">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-[#4c11bb] via-[#4c11bb] to-[#9A88F9] bg-clip-text">Modifier le mot de passe </h1>
          </header>

          <!-- Formulaire -->
          <form action="{{ route("user-password.update") }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-black">
           @csrf
           @method("PUT")
            <!-- mot de passe actuelle -->
            <div>
              <label for="current_password" class="block text-sm font-medium ">Mot de passe actuelle</label>
              <input type="text" name="current_password" id="current_password"
              value=""
                     placeholder="Mot de passe actuelle"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c11bb] focus:outline-none focus:border-transparent transition duration-300">
             @error("current_password",'updatePassword')
               <p class="text-red-500">{{ $message }}</p>
             @enderror
            </div>

                        <!-- nouveau -->
            <div>
              <label for="password" class="block text-sm font-medium ">Nouveau mot de passe :  </label>
              <input type="text" name="password" id="price"
              value=""
                     placeholder="Nouveau mot de passe "
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c11bb] focus:outline-none focus:border-transparent transition duration-300">
             @error("password","updatePassword")
               <p class="text-red-500">{{ $message }}</p>
             @enderror
            </div>
                    {{--  password confirmation --}}
            <div>
              <label for="password_confirmation" class="block text-sm font-medium ">Conirmation de mot de passe :  </label>
              <input type="text" name="password_confirmation" id="password_confirmation"
              value=""
                     placeholder="Confirmer le mot de passe"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c11bb] focus:outline-none focus:border-transparent transition duration-300">
            </div>

            @if (session("status"))
                <p class="text-green-500 text-center">Mot de passe a été modifié avec succès</p>
            @endif
            <!-- Bouton -->
            <div>
              <button id="registerBtn" type="submit"
                    class="w-full cursor-pointer flex justify-center items-center gap-2  bg-gradient-to-r from-[#5406e6] via-[#4c11bb ] to-[#320fdc] hover:opacity-[0.9] text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c11bb] transition-all duration-300 shadow-md hover:scale-[1.01]">
                <span id="btnText">Modifier</span>
                <svg id="btnSpinner" class="hidden h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16 8 8 0 01-8-8z"></path>
                </svg>
              </button>
            </div>
          </form>
      </section>
  </article>
  
</main>
@endsection
