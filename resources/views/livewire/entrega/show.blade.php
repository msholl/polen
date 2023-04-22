<div class="w-full flex flex-col justify-center align-middle">
    <div class="lg:w-fit lg:mx-auto mb-6">
        <input wire:model="search" type="search" placeholder="Buscar...">
        <input wire:model="date" type="date" name="" id="">
        <select wire:model="status" class="form-select" id="status" name="status">
            <option value=""></option>
            <option value="0"> Não Entregue</option>
            <option value="1"> Entregue</option>
        </select>
    </div>

    @if(!$entregas->isEmpty())
        <table class="tabela-entrega">
            <tr>
                <th class="text-left">Cliente</th>
                <th class="text-left">Bairro</th>
                <th class="text-left">Data</th>
                <th class="text-center">Status</th>
                <th></th>
                <th></th>
            </tr>

            @foreach($entregas as $entrega)
                <tr id="" class="table-line h-16">
                    <td class="align-middle">
                        {{$entrega->nome}}
                    </td>
                    <td class="align-middle">
                        {{$entrega->bairro}}
                    </td>
                    <td class="align-middle">
                        {{date("d/m/y", strtotime($entrega->data))}}
                    </td>
                    <td class="align-middle">
                        <form method="post" action="{{route('entregas.update', $entrega->id)}}">
                            @csrf
                            <input type="hidden" name="entregue" value="{{$entrega->entregue ? '0' : '1'}}">
                            <input type="hidden" name="id" value="{{$entrega->id}}">
                            <button type="submit" name="form-delivery" class="font-bold text-left
                                {{$entrega->entregue ? 'text-red-700' : 'text-green-700'}}">{{$entrega->entregue ? 'Retirar' : 'Entregar'}}</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>

    @else
        <h1 style="color:  #9ca3af; margin-top: 80px; font-size: 1.6em; text-align: center;">
            Nenhuma entrega disponível
        </h1>
    @endif
</div>

