<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class=" text-gray-900">
            <h2 class="text-xl font-semibold md:flex md:justify-center bg-gray-200 border-b border-gray-300 p-4">Datos del producto</h2>
            <div class="flex flex-col items-center p-6">
                <div class="flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Clave</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->clave}}</p>
                </div>
                <div class="mt-2 flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Nombre</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->nombre}}</p>
                </div>
                <div class="mt-2 flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Descripción</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->descripcion}}</p>
                </div>
                <div class="mt-2 flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Categoria</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->categoria->nombre}}</p>
                </div>
                <div class="mt-2 flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Cantidad existente</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->cantidad}}</p>
                </div>
                <div class="mt-2 flex justify-between w-full md:w-1/2">
                    <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-end font-semibold text-sm md:text-lg">Precio</p>
                    <p class="border w-1/2 border-gray-300 rounded-r-md font-light text-sm md:text-lg p-2 text-start">{{$producto->ultimoPrecio()->valor}}</p>
                </div>
            </div>
        </div>  
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class=" text-gray-900">
            <h2 class="text-xl font-semibold md:flex md:justify-center bg-gray-200 border-b border-gray-300 p-4">Historial de precios</h2>
            <div class="p-6">
                <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <x-table-th>Precio</x-table-th>
                                <x-table-th>Desde</x-table-th>
                                <x-table-th>Hasta</x-table-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($producto->precios as $precio)
                                @if(!$precio->es_ultimo)
                                <tr>
                                    <x-table-td class="text-center">{{$precio->valor}}</x-table-td>
                                    <x-table-td class="text-center">{{date('d/m/Y', strtotime($precio->created_at))}}</x-table-td>
                                    <x-table-td class="text-center">{{date('d/m/Y', strtotime($precio->updated_at))}}</x-table-td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>