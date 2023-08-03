<div class="py-12">
    <form wire:submit.prevent="store">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between gap-4">
        <div class="w-2/3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la venta</h2>
                    <div class="md:flex justify-center">
                        <div class="md:w-2/3">
                            <div class="mt-4">
                                <x-input-label for="user" :value="__('Usuario vendedor')" />
                                <x-text-input 
                                    id="user" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    :value="auth()->user()->name"
                                    readonly/>
                                <x-input-error :messages="$errors->get('user')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="productorId" :value="__('Productor')" />
                                <x-select-input
                                    id="productorId"
                                    wire:model="productorId" 
                                    wire:change="buscaProductor"
                                    class="block mt-1 w-full">
                                    <option>Selecciona un productor</option>
                                    @foreach($productores as $productor)
                                        <option value="{{$productor->id}}">{{$productor->nombre.' '.$productor->apellidos}}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('productorId')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold text-center w-full">Detalle de la venta</h2>
                    </div>
                    <div class="md:flex justify-center">
                        <div class="w-full">
                            @forelse($ventaDetalle as $key => $detalle)
                                <livewire:ventas.venta-detalle :producto="$detalle" :wire:key="$detalle" />
                            @empty
                                <p class="my-3 md:flex md:justify-center gap-1">Presiona<span class="font-semibold"> agregar </span> para empezar a registrar productos</p>
                            @endforelse
                            <div class="mt-4">
                                <x-primary-button type="button" wire:click="$emit('mostrarAlerta',{{$productos}})">Agregar</x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="md:flex justify-center">
                    <div class="md:w-full">
                        <div class="mt-4">
                            <div class="w-full md:flex md:flex-col justify-between">
                                <div class="text-center">
                                    <div class="mt-2 flex justify-between">
                                        <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Subtotal</p>
                                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{number_format($subTotal,2)}}</p>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Descuento</p>
                                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 text-center">{{number_format($descuentoSocio,2)}}</p>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Total</p>
                                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 text-center">{{number_format($total,2)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="w-full text-center">Terminar venta</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
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
