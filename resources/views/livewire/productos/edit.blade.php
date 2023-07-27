<div class="md:w-1/2">
    <form wire:submit.prevent="update">
        <div class="mt-4">
            <x-input-label for="clave" :value="__('Clave')" />
            <x-text-input 
                id="clave" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="clave" 
                :value="old('clave')"
                autofocus/>
            <x-input-error :messages="$errors->get('clave')" class="mt-2" />
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
            <x-input-label for="descripcion" :value="__('Descripcion')" />
            <x-textarea-input 
                id="descripcion" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="descripcion" 
                autofocus>{{old('descripcion')}}</x-textarea-input>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="categoria_id" :value="__('Categoria')" />
            <x-select-input
                id="categoria_id"
                wire:model="categoria_id" 
                class="block mt-1 w-full">
                <option>Selecciona una opción</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="valor" :value="__('Precio')" />
            <x-text-input 
                id="valor" 
                class="block mt-1 w-full" 
                type="number" 
                wire:model="valor" 
                :value="old('valor')"
                autofocus/>
            <x-input-error :messages="$errors->get('valor')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-primary-button>Guardar</x-primary-button>
        </div>
    </form>
</div>
