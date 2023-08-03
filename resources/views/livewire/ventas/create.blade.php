<div>
    <form wire:submit.prevent="store">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la venta</h2>
                <div class="md:flex justify-center">
                    <div class="md:w-1/2">
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
                            <x-input-label for="productor_id" :value="__('Productor')" />
                            <x-select-input
                                id="productor_id"
                                wire:model="productor_id" 
                                class="block mt-1 w-full">
                                <option>Selecciona un productor</option>
                                @foreach($productores as $productor)
                                    <option value="{{$productor->id}}">{{$productor->nombre.' '.$productor->apellidos}}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('productor_id')" class="mt-2" />
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
                    <div class="md:w-1/2">
                        @foreach($ventaDetalle as $key => $detalle)
                            <livewire:ventas.venta-detalle :producto="$detalle" :wire:key="$detalle" />
                        @endforeach
                        
                        <div class="mt-4">
                            <x-primary-button type="button" wire:click="$emit('mostrarAlerta',{{$productos}})">Agregar</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="md:flex justify-center">
                    <div class="md:w-1/2">
                        <div class="mt-4">
                            {{$this->subtotal}}
                        </div>
                        <div class="mt-4">
                            <x-primary-button>Guardar</x-primary-button>
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
        let isUsado = false;
        let isVacio = true;
        Livewire.on('mostrarAlerta', productos => {
            if(nombres.length === 0 && isVacio){
                productos.forEach(element => {
                    nombres.push(element.nombre);
                });
                isVacio = false;
            }
            if(!isUsado){
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
                            nombres.splice(index,1);
                            if(nombres.length===0){
                                isUsado = true;
                                console.log('llegue aquí');
                            }
                        }
                        
                    }
                );
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Lo siento',
                    text: 'Ya no puedes agregar más productos',
                });
            }
        });
    </script>    
@endpush
