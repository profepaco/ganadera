<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Actualización de patente') }}
            </h2>
            <a href="{{ route('productores.show',['productore'=>$productor]) }}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la patente</h2>
                    <div class="md:flex md:justify-center">
                        <form wire:submit.prevent="actualizarPatente" class="md:w-1/2">
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
                                    type="file" wire:model="nueva_imagen"
                                    accept="image/*"
                                />
                                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                            </div>
                            <div class="flex justify-normal gap-4">
                                @if($imagen)
                                    <div class="mt-4 w-48">
                                        Imagen actual:
                                        <img src="{{asset('storage/patentes/'.$productor->patente->fierros[0]->imagen)}}">
                                    </div>
                                @endif
                                @if($nueva_imagen)
                                    <div class="mt-4 w-48">
                                        Imagen nueva:
                                        <img src="{{ $nueva_imagen->temporaryUrl() }}">
                                    </div>
                                @endif
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
