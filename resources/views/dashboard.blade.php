<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:justify-between md:gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold flex justify-center">Total de productores</h2>
                        <p class="text-8xl font-bold text-center p-2">{{$no_productores}}</p>
                        <p class="text-xl font-bold text-center p-2">Últimos registrados</p>
                        <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                            <table class="table-auto w-full mt-4">
                                <thead>
                                    <tr>
                                        <x-table-th>Nombre</x-table-th>
                                        <x-table-th>Socio</x-table-th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimosProductores as $productor)
                                        <tr>
                                            <x-table-td>{{$productor->nombre.' '.$productor->apellidos}}</x-table-td>
                                            <x-table-td>{{$productor->esSocio ? 'Si':'No'}}</x-table-td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <x-link-button href="{{route('productores.index')}}">Ver todos</x-link-button>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:w-1/2 mt-4 md:mt-0">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold flex justify-center">Total de Patentes</h2>
                        <p class="text-8xl font-bold text-center p-2">{{$no_patentes}}</p>
                        <p class="text-xl font-bold text-center p-2">Últimas registradas</p>
                        <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                            <table class="table-auto w-full mt-4">
                                <thead>
                                    <tr>
                                        <x-table-th>Libro</x-table-th>
                                        <x-table-th>Foja</x-table-th>
                                        <x-table-th>Productor</x-table-th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimasPatentes as $patente)
                                        <tr>
                                            <x-table-td>{{$patente->libro}}</x-table-td>
                                            <x-table-td>{{$patente->foja}}</x-table-td>
                                            <x-table-td>{{$patente->productor->nombre.' '.$patente->productor->apellidos}}</x-table-td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <x-link-button href="{{route('patentes.index')}}">Ver todas</x-link-button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="md:flex md:justify-between md:gap-4 mt-4" >
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold flex justify-center">Total de ventas del mes</h2>
                        <p class="text-8xl font-bold text-center p-2">{{$no_ventas_mes}}</p>
                        <p class="text-xl font-bold text-center p-2">Últimas ventas registradas</p>
                        <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                            <table class="table-auto w-full mt-4">
                                <thead>
                                    <tr>
                                        <x-table-th>Fecha</x-table-th>
                                        <x-table-th>Cliente</x-table-th>
                                        <x-table-th>Importe</x-table-th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimasVentas as $venta)
                                        <tr>
                                            <x-table-td>{{date('d/m/Y', strtotime($venta->created_at))}}</x-table-td>
                                            <x-table-td>{{$venta->productor->nombre.' '.$venta->productor->apellidos}}</x-table-td>
                                            <x-table-td>{{'$ '.number_format($venta->productor->esSocio ? $venta->importe -($venta->importe*.2) : $venta->importe,2)}}</x-table-td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <x-link-button href="{{route('ventas.index')}}">Ver todas</x-link-button>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
