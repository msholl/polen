<div class="w-full flex flex-col justify-center align-middle">
    <div class="lg:w-fit lg:mx-auto mb-6">
        <input wire:model="search" type="search" placeholder="Buscar...">
        <input wire:model="date" type="date" name="" id="">
    </div>

    @if(!$producao->isEmpty())
        <table style="" class="table lg:w-[80%] lg:mx-auto">
            <thead>
            <tr class="p-6 font-bold text-xl text-left text-[#967624]">
                <th>Sabor</th>
                <th>Qtd.</th>
                <th>Data</th>
                <th class="text-center">Obs.</th>
            </tr>
            </thead>
            <tbody>
            @foreach($producao as $prod)
                <tr id="" class="table-line h-16 ">
                    <td class="w-fit align-middle">
                        {{$prod->sabor}}
                    </td>
                    <td class="w-fit align-middle">
                        {{$prod->quantidade}}
                    </td>
                    <td class="w-fit align-middle">
                        {{date("d/m/Y", strtotime($prod->data))}}
                    </td>
                    <td class="w-[60%] align-middle">
                        {{$prod->observacao}}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    @else
        <h1 style="color:  #9ca3af; margin-top: 80px; font-size: 1.6em; text-align: center;">
            Sem produção no dia
        </h1>
    @endif
</div>

