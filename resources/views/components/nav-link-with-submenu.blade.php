@props(['active', 'permission', 'items'])

@php
    $classes = ($active ?? false)
                ? 'arrow block w-full pl-3 pr-4 py-2 border-l-4 border-yellow-400 text-left text-base font-medium text-black bg-[#b08d1e] focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
                : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp
@can($permission)
    <div class="submenu-wrap">
        <a {{ $attributes->merge(['class' => $classes]) }}>
            {{ $slot }}
        </a>


        @if($active === true)
            <ul class="bg-[#bf9b26]">
                @foreach($items as $item => $route)
                    <li class="pl-1">
                        <a href="{{route($route)}}" class="text-base px-4 py-2"> {{$item}} </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endcan
