<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entregas') }}
        </h2>
    </x-slot>

    <table style="" class="tabela-entrega">
        <tr style="">
            <th>Cliente</th>
            <th>Bairro</th>
            <th>Data</th>
            <th>Status</th>
            <th></th>
            <th></th>

        </tr>

        @foreach($entregas as $entrega)
            <tr id="" class="table-line">
                <td>
                    {{$entrega->nome}}
                </td>
                <td>
                    {{$entrega->bairro}}
                </td>
                <td>
                    {{date("d/m/Y", strtotime($entrega->data_entrega))}}
                </td>
                <td>
                    @if($entrega->entregue)
                        <span style="color: darkgreen">
                                OK
                            </span>
                        {{--                            ---}}
                        {{--                            {{date_format($entrega->updated_at,"d/m/Y H:i")}}--}}
                    @else
                        <span style="color: darkred">

                            </span>
                    @endif
                </td>
                <td>
                    {{--                    @if($entrega->entregue == 0)--}}
                    {{--                        <form method="post" action="{{route('entregas.update', $entrega->id)}}">--}}
                    {{--                            @csrf--}}
                    {{--                            <input type="hidden" name="entregue" value="1">--}}
                    {{--                            <input type="hidden" name="id" value="{{$entrega->id}}">--}}
                    {{--                            <button type="submit" name="form-delivery" style="color: darkgreen"><i--}}
                    {{--                                    class="fa-solid fa-check"></i></button>--}}
                    {{--                        </form>--}}
                    {{--                    @else--}}
                    {{--                        <form method="post" action="{{route('entregas.update', $entrega->id)}}">--}}
                    {{--                            @csrf--}}
                    {{--                            <input type="hidden" name="entregue" value="0">--}}
                    {{--                            <input type="hidden" name="id" value="{{$entrega->id}}">--}}
                    {{--                            <button type="submit" name="form-delivery" style="color: darkred"><i--}}
                    {{--                                    class="fa-solid fa-xmark"></i></button>--}}
                    {{--                        </form>--}}
                    {{--                    @endif--}}
                </td>
            </tr>

        @endforeach
    </table>
    @else
        <h1 style="color:  #9ca3af; margin-top: 80px; font-size: 1.6em; text-align: center;">
            Nenhuma entrega disponível
        </h1>
    @endif

</x-app-layout>
