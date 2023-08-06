<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle del venta
            </h2>
            <a href="{{ route('ventas.index')}}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>
    <div class="py-12">
        <livewire:ventas.show :venta="$venta"/>
    </div>
</x-app-layout>