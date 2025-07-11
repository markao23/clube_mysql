

<x-layouts.app>
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-card 
            title="Caixa da organização " 
            value="R$ 1.250,00" 
            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>'>

            <a href="#">Ver detalhes das vendas</a>
        </x-card>

        <x-card 
            title="Novos Usuários" 
            value="32"
            icon='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'>
            
            <a href="#">Gerenciar usuários</a>
        </x-card>

        
        <x-card 
            title="Total de Produtos" 
            value="480">
            <a href="#">Ver estoque</a>
        </x-card>
    </div>
    @livewire('dashboard-chart')
</x-layouts.app>