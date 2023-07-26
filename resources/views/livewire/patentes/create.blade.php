<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrando el ganado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la patente</h2>
                    <div class="md:flex md:justify-center">
                        <form wire:submit.prevent="guardarPatente" class="md:w-1/2">
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
                            <div class="md:flex md:flex-wrap -mx-3">
                                <div class="mt-4 md:w-1/2 px-3">
                                    <x-input-label for="libro" :value="__('Libro')" />
                                    <x-text-input 
                                        id="libro" 
                                        class="block mt-1 w-full" 
                                        type="number" 
                                        wire:model="libro" 
                                        :value="old('libro')" autofocus />
                                    <x-input-error :messages="$errors->get('libro')" class="mt-2" />
                                </div>
                                <div class="mt-4 md:w-1/2 px-3">
                                    <x-input-label for="foja" :value="__('Foja')" />
                                    <x-text-input 
                                        id="foja" 
                                        class="block mt-1 w-full" 
                                        type="number" 
                                        wire:model="foja" 
                                        :value="old('foja')" />
                                    <x-input-error :messages="$errors->get('foja')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="imagen" :value="__('Imagen')" />
                                <x-text-input 
                                    id="imagen" 
                                    class="block mt-1 w-full" 
                                    type="file" wire:model="imagen"
                                    accept="image/*"
                                />
                                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                            </div>
                            @if($imagen)
                                <div class="mt-4 w-48">
                                    <img src="{{ $imagen->temporaryUrl() }}">
                                </div>
                            @endif
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
