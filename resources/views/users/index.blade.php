<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-xs">
                    {{session('message')}}
                </div>
            @endif
            <x-link-button class="mx-2" href="{{route('usuarios.create')}}">Nuevo usuario</x-link-button>
            <livewire:users.index />
        </div>
    </div>
</x-app-layout>
