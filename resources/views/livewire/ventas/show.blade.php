<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between gap-4">
    {{-- Stop trying to control. --}}
    <div class="w-2/3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-semibold md:flex md:justify-center">Datos de la venta</h2>
                <div class="md:flex justify-center">
                    <div class="md:w-full">
                        <div class="mt-4">
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/3 text-center font-semibold uppercase text-sm lg:text-lg">Cliente</p>
                                <p class="border w-2/3 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{$venta->productor->nombre.' '.$venta->productor->apellidos}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/3 text-center font-semibold uppercase text-sm lg:text-lg">RFC</p>
                                <p class="border w-2/3 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{$venta->productor->RFC}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/3 text-center font-semibold uppercase text-sm lg:text-lg">Socio activo</p>
                                <p class="border w-2/3 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{$venta->productor->esSocio ? 'Si':'No'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mt-4 text-2xl font-semibold md:flex md:justify-center">Productos</h2>
                <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <x-table-th>Clave</x-table-th>
                                <x-table-th>Nombre</x-table-th>
                                <x-table-th>Cantidad</x-table-th>
                                <x-table-th>Importe</x-table-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venta->productos as $producto)
                            <tr>
                                <x-table-td>{{$producto->clave}}</x-table-td>
                                <x-table-td>{{$producto->nombre}}</x-table-td>
                                <x-table-td>{{$producto->pivot->cantidad}}</x-table-td>
                                <x-table-td>{{$producto->pivot->precio}}</x-table-td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="w-1/3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="md:flex justify-center">
                    <div class="md:w-full">
                        <div class="mt-4">
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Subtotal</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{number_format($venta->importe,2)}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Descuento</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{number_format($descuento,2)}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-1 px-1 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Total</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg p-1 md:p-1 text-center">{{number_format($total,2)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
