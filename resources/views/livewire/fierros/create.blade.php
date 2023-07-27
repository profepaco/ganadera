<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registro de fierro') }}
            </h2>
            <a href="{{ route('patente.show',['productore'=>$productor,'patente'=>$patente]) }}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos del fierro</h2>
                    <div class="md:flex md:justify-center">
                        <form wire:submit.prevent="guardarFierro" class="md:w-1/2">
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