<div class="p-2 mt-4 md:flex md:justify-betweend border-2 border-gray-300 hover:border-indigo-500 hover:ring-indigo-500 rounded-md shadow-sm">
    <div class="md:w-2/4 px-3">
        <p class="font-bold text-lg">{{$producto_clave.' - '.$producto_nombre}}</p>
    </div>
    <div class="md:w-1/4 px-3 flex justify-center gap-2">
        <button type="button" class="font-black text-indigo-500 text-lg" wire:click="disminuirCantidad()">-</button>
        <input class="border-none outline-none focus:border-none text-center p-0" size="4" type="text" wire:model="cantidad"/>
        <button type="button" class="font-black text-indigo-500 text-lg" wire:click="aumentarCantidad()">+</button>
    </div>
    <div class="md:w-1/4 flex px-3 text-end gap-4">
        <p class="w-full font-semibold text-lg">{{$importe}}</p>
        <button type="button" wire:click="eliminarCampo()"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 hover:text-red-800"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg></button>
    </div>
</div>
