@props(['title' => 'Título Padrão', 'value' => '0', 'icon' => ''])

{{-- 
  Container principal do card. 
  Note que usei p-4 (16px) em vez de p-6 (24px) para um visual mais compacto.
--}}
<div class="bg-white rounded-xl shadow-lg p-4 flex flex-col h-full">

    {{-- CABEÇALHO: Título e Ícone --}}
    <div class="flex justify-between items-center">
        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">
            {{ $title }}
        </p>
        @if ($icon)
            <div class="text-gray-400">
                {!! $icon !!}
            </div>
        @endif
    </div>

    {{-- CORPO: O valor principal --}}
    {{-- A classe mt-4 (16px) dá um respiro do cabeçalho, sem exagerar. --}}
    <div class="mt-4">
        <h2 class="text-3xl font-bold text-gray-800">
            {{ $value }}
        </h2>
    </div>

    {{-- RODAPÉ: Link de detalhes --}}
    {{-- 
      - mt-auto: Empurra o rodapé para o fundo do card.
      - pt-3 e border-t: Criam uma linha e um espaço sutil para separar, 
        dando um acabamento profissional.
    --}}
    <div class="mt-auto pt-3 border-t border-gray-100">
        <div class="text-sm text-blue-600 hover:underline">
            {{ $slot }}
        </div>
    </div>

</div>