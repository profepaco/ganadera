<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $productor->esSocio ? 'Productor Asociado':'Productor no Asociado' }}
            </h2>
            <a href="{{ route('productores.index')}}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-xs">
                    {{session('message')}}
                </div>
            @endif
            <livewire:productores.show :productor="$productor"/>
        </div>
    </div>
</x-app-layout>
