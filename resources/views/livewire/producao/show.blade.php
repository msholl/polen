<div class="w-full flex flex-col justify-center align-middle">
    <div class="lg:w-fit lg:mx-auto mb-6">
        <input wire:model="search" type="search" placeholder="Buscar...">
        <input wire:model="date" type="date" name="" id="">
    </div>

    @if(!$producao->isEmpty())
        <table style="" class="table lg:w-[80%] lg:mx-auto">
            <thead>
            <tr class="p-6 font-bold text-xl text-left text-[#967624]">
                <th class="max-sm:pl-1">Sabor</th>
                <th>Qtd.</th>
                <th>Data</th>
                <th>Obs.</th>
            </tr>
            </thead>
            <tbody>
            @foreach($producao as $prod)
                <tr id="" class="table-line h-10">
                    <td class="w-fit align-middle max-sm:pl-1">
                        {{$prod->sabor}}
                    </td>
                    <td class="w-fit align-middle">
                        {{$prod->quantidade}}
                    </td>
                    <td class="w-fit align-middle">
                        {{date("d/m/Y", strtotime($prod->data))}}
                    </td>
                    <td class="align-middle text-center">
                        @if($prod->observacao != null)
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'observacoes{{$prod->id}}')"
                                    class="text-green-900">
                                <x-icons.chat-bubble-left/>
                            </button>
                            <x-modal name="observacoes{{$prod->id}}" :show="$errors->userDeletion->isNotEmpty()"
                                     class="bg-emerald-800"
                                     focusable>
                                <p class="p-4 text-left">
                                    {{$prod->observacao}}
                                </p>
                            </x-modal>
                        @endif

                    </td>
                    @can('admin')
                        <td class="w-fit align-middle max-sm:hidden">
                            <a href="{{route('producao.edit', $prod->id)}}" class="">
                                <x-icons.pencil-square/>
                            </a>
                        </td>
                        <td class="w-fit align-middle max-sm:hidden">
                            <form action="{{route('producao.destroy', $prod->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <x-icons.trash/>
                                </button>
                            </form>

                        </td>
                    @endcan
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

