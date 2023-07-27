<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Actualización de ganado') }}
            </h2>
            <a href="{{ route('productores.show',['productore'=>$ganado->productor]) }}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos del ganado</h2>
                    <div class="md:flex md:justify-center">
                        <form wire:submit.prevent="actualizarGanado" class="md:w-1/2 overflow-auto">                          
                            <div class="mt-4">
                                <x-input-label for="Productor" :value="__('Productor')" />
                                <x-text-input 
                                    id="Productor" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    readonly
                                    :value="$ganado->productor->nombre.' '.$ganado->productor->apellidos"
                                />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="especie" :value="__('Especie')" />
                                <x-select-input
                                    id="especie"
                                    wire:model="especie_id" 
                                    class="block mt-1 w-full">
                                    <option>Selecciona una opción</option>
                                    @foreach($especies as $especie)
                                        <option value="{{$especie->id}}" {{$especie_id === $especie->id ? 'selected':''}}>{{$especie->nombre}}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="cantidad" :value="__('Cantidad')" />
                                <x-text-input 
                                    id="cantidad" 
                                    class="block mt-1 w-full" 
                                    type="number" 
                                    wire:model="cantidad" 
                                    :value="old('cantidad')" />
                                <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-primary-button>
                                    {{ __('Guardar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>