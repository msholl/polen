<nav class="m-0 p-0 pl-2 fixed overflow-auto h-full w-60 max-w-xs flex flex-col bg-yellow-500">
    <div class="flex justify-center">
        <a href="{{route('entregas')}}">
            <x-polen-logo class="block w-28 w-28 fill-current text-gray-800"/>
        </a>
    </div>
    <div class="mb-6 text-center"> Olá, <b>{{ Auth::user()->name }}</b></div>

    <div>
        <x-responsive-nav-link :href="route('entregas')" :active="request()->routeIs('entregas')">
            {{ __('Painel') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>


    <div class="absolute bottom-4">
        <a href="{{route('profile.edit')}}" class="text-base px-4 py-2"> Perfil </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-900 text-base px-4 py-2 font-bold">Sair</button>
        </form>
    </div>
</nav>
