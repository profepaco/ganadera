<div class="md:grid md:grid-cols-2 gap-4">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class=" text-gray-900">
            <h2 class="text-xl font-semibold md:flex md:justify-center bg-gray-200 border-b border-gray-300 p-4">Datos personales</h2>
            <div class="p-6">
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">RFC</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->RFC}}</p>
                </div>
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">CURP</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->CURP}}</p>
                </div>
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">INE</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->INE}}</p>
                </div>
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">Nombre</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->nombre.' '.$productor->apellidos}}</p>
                </div>
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">Domicilio</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->domicilio}}</p>
                </div>
                <div class="mt-2 flex justify-between">
                    <p class="bg-gray-300 py-1 px-2 rounded-l-md w-1/2 text-end font-semibold">Teléfono</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm p-1 text-start">{{$productor->telefono}}</p>
                </div>
            </div>
        </div>
    </div>
    <livewire:patentes.index :productor="$productor"/>
    <livewire:ganado.index :productor="$productor"/>
    <livewire:propiedades.index :productor="$productor" />
</div>
