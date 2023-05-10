<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar sabor para produção') }}
        </h2>
    </x-slot>

    <form action="{{route('producao.store')}}" method="post"
          class="flex lg:w-[50%] lg:max-w-[700px] lg:justify-between m-auto">
        @csrf
        <div class="flex flex-col">
            <label for="sabor" class="text-lg">Sabor</label>
            <input type="text" class="rounded" name="sabor" id="sabor">
        </div>
        <div class="flex flex-col">
            <label for="quantidade" class="text-lg">Quantidade</label>
            <input type="text" class="rounded" name="quantidade" id="quantidade">
        </div>
        <div class="flex flex-col">
            <label for="data" class="text-lg">Data</label>
            <input type="date" class="rounded" name="data" id="data">
        </div>


        <button type="submit"
                class="bg-[#DEB028] p-3 h-[38px] rounded shadow-sm border border-[#382D0A] lg:relative lg:top-8">
            Adicionar
        </button>
    </form>

</x-app-layout>
