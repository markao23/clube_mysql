<nav x-data="{ mobileMenuOpen: false, profileMenuOpen: false }" class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
  <div class=" px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <svg class="h-8 w-auto text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.563A.562.562 0 019 14.437V9.564z" />
          </svg>
        </div>
        <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
          <a href="#" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
          <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Membros</a>
          <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Pagamentos</a>
          <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Relatórios</a>
        </div>
      </div>

      <div class="flex items-center">
        <div class="flex-shrink-0">
          <button type="button" class="relative inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Novo Pagamento
          </button>
        </div>

        <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
          <div x-data="{ profileMenuOpen: false }" class="relative">
            <div>
              <button @click="profileMenuOpen = !profileMenuOpen" type="button" class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="sr-only">Abrir menu do usuário</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
            
            <div x-show="profileMenuOpen"
                 @click.away="profileMenuOpen = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                 style="display: none;">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Meu Perfil</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configurações</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sair</a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</nav>