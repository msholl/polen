<nav
    class="m-0 p-0 lg:fixed lg:overflow-auto lg:h-full lg:w-60 flex flex-col bg-[#F7C32D] relative h-auto w-full lg:overflow-hidden">
    <div class="flex justify-center">
        <a href="{{route('entregas.index')}}">
            <x-polen-logo class="block w-28 w-28 fill-current text-gray-800"/>
        </a>
    </div>

    <input type="checkbox" class="peer absolute bottom-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer lg:hidden">
    {{--    Icon    --}}
    <div
        class="absolute transition-transform duration-500 rotate-0 peer-checked:rotate-180 bottom-2 w-full flex justify-center lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
        </svg>
    </div>

    {{-- Contentet --}}
    <div
        class="lg:overflow-visible overflow-hidden sm:transition-all sm:duration-700 sm:max-h-0 sm:peer-checked:max-h-96 sm:mb-12">
        <div class="mb-6 text-center"> Olá, <b>{{ Auth::user()->name }}</b></div>


        {{--        <ul id="menu-itens">--}}
        {{--            <li>--}}
        {{--                @can('entregar')--}}
        {{--                    <x-responsive-nav-link :href="route('entregas.index')"--}}
        {{--                                           :active="request()->routeIs('entregas.index')">--}}
        {{--                        {{ __('Entregas') }}--}}
        {{--                    </x-responsive-nav-link>--}}
        {{--                @endcan--}}
        {{--            </li>--}}
        {{--        </ul>--}}
        <x-nav-link-with-submenu :href="route('entregas.index')" :active="request()->routeIs('entregas.*')"
                                 :items="[]" :permission="'entregar'">
            {{ __('Entregas') }}
        </x-nav-link-with-submenu>
        @php
            $menuItems = ['Adicionar produção' => 'producao.create']
        @endphp
        <x-nav-link-with-submenu :href="route('producao.index')" :active="request()->routeIs('producao.*')"
                                 :items="$menuItems" :permission="'produzir'">
            {{ __('Produção') }}
        </x-nav-link-with-submenu>

        <x-nav-link-with-submenu :href="route('estoque.index')" :active="request()->routeIs('estoque.*')"
                                 :items="[]" :permission="'produzir'">
            {{ __('Estoque') }}
        </x-nav-link-with-submenu>

        <div class="lg:absolute lg:bottom-4">
            <a href="{{route('profile.edit')}}" class="text-base px-4 py-2"> Perfil </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-900 text-base px-4 py-2 font-bold">Sair</button>
            </form>
        </div>

    </div>
</nav>
