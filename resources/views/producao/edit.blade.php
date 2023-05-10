<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar sabor para produção') }}
        </h2>
    </x-slot>

    <form action="{{route('producao.update', $producao->id)}}" method="post">
        @csrf
        @method('PUT')

        <input type="text" name="sabor" id="" value="{{$producao->sabor}}">
        <label for="sabor">Sabor</label>

        <input type="text" name="quantidade" id="" value="{{$producao->quantidade}}">
        <label for="quantidade">Quantidade</label>

        <input type="date" name="data" id="" value="{{$producao->data}}">
        <label for="data"></label>

        <button type="submit">Adicionar</button>
    </form>

</x-app-layout>
