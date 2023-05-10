<div class="w-full flex flex-col justify-center align-middle">
    <div class="lg:w-fit lg:mx-auto mb-6 flex flex-wrap lg:block">
        <input wire:model="search" type="search" class="lg:w-auto w-[95%] mx-auto mb-2" placeholder="Buscar...">
        <input wire:model="date" type="date" name="" id="" class="w-[45%] mx-auto lg:w-fit">
        <select wire:model="status" class="form-select w-[45%] mx-auto lg:w-fit" id="status" name="status">
            <option value="all">Todos</option>
            <option value="0" selected> Não Entregue</option>
            <option value="1"> Entregue</option>
        </select>
    </div>
    @php
        $disable = false;
            if ($date != date('Y-m-d')) {
                $disable = true;
            }
    @endphp
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
                <tr id="{{$entrega->id}}" class="table-line h-16 text-left sm:align-middle">
                    <td class="align-middle lg:w-2/5 w-[35%] px-1">
                        {{$entrega->nome}}
                    </td>
                    <td class="align-middle lg:w-1/5 w-[25%]">
                        {{$entrega->bairro}}
                    </td>
                    <td class="align-middle lg:w-1/5 w-[15%]">
                        {{date("d/m/y", strtotime($entrega->data))}}
                    </td>
                    <td class="align-middle lg:w-1/5">
                        <form method="post" action="{{route('entregas.update', $entrega->id)}}">
                            @csrf
                            <input type="hidden" name="entregue" value="{{$entrega->entregue ? '0' : '1'}}">
                            <input type="hidden" name="id" value="{{$entrega->id}}">
                            <button type="submit" name="form-delivery" class="font-bold text-left
                                {{$entrega->entregue ? 'text-red-700' : 'text-green-700'}}"
                                {{$disable ? 'disabled' : ''}}>

                                {{$entrega->entregue ? 'Retirar' : 'Entregar'}}
                            </button>
                        </form>
                        <span class="text-sm hidden lg:block">
                            {{$entrega->data_entrega ? date("d/m/y H:i", strtotime($entrega->data_entrega)) : ''}}
                        </span>
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

