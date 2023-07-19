<div class="md:w-1/2">
    <form wire:submit.prevent="store">
        <div class="md:flex md:flex-wrap -mx-3">
            <div class="mt-4 md:w-1/2 px-3">
                <x-input-label for="RFC" :value="__('RFC')" />
                <x-text-input 
                    id="RFC" 
                    class="block mt-1 w-full" 
                    type="text" 
                    wire:model="RFC" 
                    :value="old('RFC')"
                    autofocus/>
                <x-input-error :messages="$errors->get('RFC')" class="mt-2" />
            </div>
            <div class="mt-4 md:w-1/2 px-3">
                <x-input-label for="INE" :value="__('INE')" />
                <x-text-input 
                    id="INE" 
                    class="block mt-1 w-full" 
                    type="text" 
                    wire:model="INE" 
                    :value="old('INE')"
                    autofocus/>
                <x-input-error :messages="$errors->get('INE')" class="mt-2" />
            </div>
        </div>
        <div class="mt-4">
            <x-input-label for="CURP" :value="__('CURP')" />
            <x-text-input 
                id="CURP" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="CURP" 
                :value="old('CURP')"
                autofocus/>
            <x-input-error :messages="$errors->get('CURP')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input 
                id="nombre" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="nombre" 
                :value="old('nombre')"
                autofocus/>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input 
                id="apellidos" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="apellidos" 
                :value="old('apellidos')"
                autofocus/>
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="domicilio" :value="__('Domicilio')" />
            <x-text-input 
                id="domicilio" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="domicilio" 
                :value="old('domicilio')"
                autofocus/>
            <x-input-error :messages="$errors->get('domicilio')" class="mt-2" />
        </div>
        <div class="md:flex md:flex-wrap -mx-3">
            <div class="mt-4 md:w-1/2 px-3">
                <x-input-label for="telefono" :value="__('Telefono')" />
                <x-text-input 
                    id="telefono" 
                    class="block mt-1 w-full" 
                    type="text" 
                    wire:model="telefono" 
                    :value="old('telefono')"
                    autofocus/>
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>
            <div class="mt-4 md:w-1/2 px-3">
                <x-input-label for="esSocio" :value="__('Socio')" />
                <x-select-input
                    id="esSocio"
                    wire:model="esSocio" 
                    class="block mt-1 w-full">
                    <option>Selecciona una opción</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('esSocio')" class="mt-2" />
            </div>
        </div>
        <div class="mt-4">
            <x-primary-button>Guardar</x-primary-button>
        </div>
    </form>
</div>
