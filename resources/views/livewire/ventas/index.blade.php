<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-semibold md:flex md:justify-center">Ventas registradas</h2>
            @if(count($ventas)>0)
                <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <x-table-th>Id</x-table-th>
                            <x-table-th>Cliente</x-table-th>
                            <x-table-th>Fecha</x-table-th>
                            <x-table-th>Importe</x-table-th>
                            <x-table-th>Acciones</x-table-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $venta)
                            <tr>
                                <x-table-td>{{$venta->id}}</x-table-td>
                                <x-table-td>{{$venta->productor->nombre.' '.$venta->productor->apellidos}}</x-table-td>
                                <x-table-td>{{date('d/m/Y', strtotime($venta->created_at))}}</x-table-td>
                                <x-table-td>{{'$ '.number_format($venta->productor->esSocio ? $venta->importe -($venta->importe*.2) : $venta->importe,2)}}</x-table-td>
                                <x-table-td>
                                    <div class="flex flex-col md:flex-row justify-center">
                                        <a href="{{route('ventas.show',['venta'=>$venta])}}" class="text-gray-500 hover:text-gray-700 mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <button wire:click="$emit('mostrarAlerta','{{$venta->id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 hover:text-red-800 mx-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </x-table-td>                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            @else
                <p class="my-3 md:flex md:justify-center gap-1">Todavía no tienes<span class="font-semibold"> Ventas </span>registrados</p>
            @endif
        </div>
    </div>
    <div class="flex justify-center mt-10">
        {{$ventas->links()}}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('mostrarAlerta', productoId => {
            Swal.fire({
            title: '¿Deseas eliminar el producto?',
            text: "Una vez eliminado el producto no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarProducto',productoId);
                    Swal.fire(
                    'Se elimino el producto',
                    'Eliminado correctamente',
                    'success'
                    );
                }
            });
        });
    </script>    
@endpush
