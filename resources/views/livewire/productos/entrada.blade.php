<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Entrada de productos') }}
            </h2>
            <a href="{{ route('productos.index')}}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <form wire:submit.prevent="store">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between gap-4">
            <div class="w-2/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold text-center w-full">Lista de productos</h2>
                        <div class="md:flex justify-center">
                            <div class="w-full">
                                @forelse($entradaDetalle as $key => $detalle)
                                    <livewire:productos.entrada-detalle :producto="$detalle" :wire:key="$detalle" />
                                @empty
                                    <p class="my-3 md:flex md:justify-center gap-1">Presiona<span class="font-semibold"> agregar </span> para empezar a registrar productos</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-primary-button type="button" wire:click="$emit('mostrarAlerta',{{$productos}})">Agregar</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold text-center w-full">Total de productos</h2>
                        <p class="mt-4 text-3xl font-extralight text-center w-full">{{$total}}</p>
                        <div class="mt-4">
                            @if(count($entradaDetalle)>0)
                            <x-primary-button class="w-full text-center">Terminar</x-primary-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const nombres = [];
        Livewire.on('mostrarAlerta', productos => {
            if(nombres.length==0){
                productos.forEach(element => {
                    nombres.push(element.nombre);
                });
            }
            Swal.fire({
                title: 'Selecciona el producto',
                input: 'select',
                inputOptions: nombres,
                inputLabel: 'Selecciona un producto',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Agregar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let index = parseInt(result.value);
                        Livewire.emit('agregarCampos',nombres[result.value]);
                    }
                }
            );
        });
    </script>    
@endpush

