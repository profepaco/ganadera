<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Entrada de productos') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

