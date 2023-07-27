<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registro de propiedad') }}
            </h2>
            <a href="{{ route('productores.show',['productore'=>$productor]) }}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la propiedad</h2>
                    <div class="md:flex md:justify-center">
                        <form wire:submit.prevent="guardarPropiedad" class="md:w-1/2">
                            <div class="mt-4">
                                <x-input-label for="Productor" :value="__('Productor')" />
                                <x-text-input 
                                    id="Productor" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    readonly
                                    :value="$productor->nombre.' '.$productor->apellidos"
                                />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="UPP" :value="__('UPP')" />
                                <x-text-input 
                                    id="UPP" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    wire:model="UPP" 
                                    :value="old('UPP')" 
                                    autofocus />
                                <x-input-error :messages="$errors->get('UPP')" class="mt-2" />
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="lugar" :value="__('Lugar')" />
                                <x-text-input 
                                    id="lugar" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    wire:model="lugar" 
                                    :value="old('lugar')" />
                                <x-input-error :messages="$errors->get('lugar')" class="mt-2" />
                            </div>
                            
                            <div class="md:flex md:flex-wrap -mx-3">
                                <div class="mt-4 md:w-1/2 px-3">
                                    <x-input-label for="tipo_tenencia" :value="__('Tipo')" />
                                    <x-select-input
                                        id="especie"
                                        wire:model="tipo_tenencia" 
                                        class="block mt-1 w-full">
                                        <option>Selecciona una opción</option>
                                        <option value="pequeña">Pequeña propiedad</option>
                                        <option value="ejidal">Ejidal</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('tipo_tenencia')" class="mt-2" />
                                </div>
                                <div class="mt-4 md:w-1/2 px-3">
                                    <x-input-label for="superficie" :value="__('Superficie')" />
                                    <x-text-input 
                                        id="superficie" 
                                        class="block mt-1 w-full" 
                                        type="text" 
                                        wire:model="superficie" 
                                        :value="old('superficie')"
                                        />
                                    <x-input-error :messages="$errors->get('superficie')" class="mt-2" />
                                </div>
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
