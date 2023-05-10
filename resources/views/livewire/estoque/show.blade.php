<div class="w-full flex flex-col justify-center align-middle">
    <div class="lg:w-fit lg:mx-auto mb-6 flex flex-wrap lg:block">
        <input wire:model="search" type="search" class="lg:w-auto w-[95%] mx-auto mb-2"
               placeholder="Buscar por sabor...">
        <select wire:model="embalagemFilter" class="form-select w-[45%] mx-auto lg:w-fit" id="status" name="status">
            <option value="all" selected>Todas</option>
            <option value="1"> Pote 2L</option>
            <option value="2"> Pote 5L</option>
            <option value="3"> Caixa 5L</option>
        </select>
    </div>
    @if(!$estoque->isEmpty())
        <table style="" class="table lg:w-[80%] lg:mx-auto">
            <thead>
            <tr class="p-6 font-bold text-xl text-left text-[#967624]">
                <th>Sabor</th>
                <th>Qtd.</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estoque as $item)
                <tr id="" class="table-line h-16 ">
                    <td class="w-fit align-middle">
                        {{$item->sabor}}
                    </td>
                    <td class="w-fit align-middle">
                        {{$item->quantidade}}
                    </td>
                    <td class="w-fit align-middle">
                        {{$item->embalagem}}
                    </td>
                    <td class="w-fit align-middle max-w-[100px]">
                        <form action="{{route('estoque.update', $item->id)}}" method="post" class="max-w-fit">
                            @csrf
                            <select class="w-30 text-sm pl-2 pr-7 rounded" name="operacao" id="operacao">
                                <option value="+">Adicionar</option>
                                <option value="-">Remover</option>
                            </select>
                            <input type="text" class="border w-16 h-[38px] rounded" name="quantidadeOperacao"
                                   id="quatidadeOperacao">

                            <button type="submit"
                                    class="bg-[#DEB028] p-3 h-[38px] rounded shadow-sm border border-[#382D0A]">
                                Salvar
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h1 style="color:  #9ca3af; margin-top: 80px; font-size: 1.6em; text-align: center;">
            Estoque zerado!
        </h1>
    @endif
</div>

