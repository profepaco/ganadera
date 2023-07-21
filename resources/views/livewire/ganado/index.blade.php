<div class="mt-4 md:mt-0 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class=" text-gray-900">
        <div class="flex justify-between bg-gray-200 border-b border-gray-300 p-4">
            <h2 class="text-xl font-semibold text-center w-full">Ganado</h2>
            <a class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('ganado.create',['productore'=>$productor])}}">Agregar</a>
        </div>
        <div class="p-6">
            @if(count($productor->ganado)>0)
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <x-table-th>Especie</x-table-th>
                        <x-table-th>Cantidad</x-table-th>
                        <x-table-th>Acciones</x-table-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productor->ganado as $ganado)
                    <tr>
                        <x-table-td>{{$ganado->especie->nombre}}</x-table-td>
                        <x-table-td>{{$ganado->cantidad}}</x-table-td>
                        <x-table-td>
                            <div class="flex justify-center">
                                    <a href="{{route('ganado.edit',['productore'=>$productor,'ganado'=>$ganado])}}" class="text-indigo-500 hover:text-indigo-700 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button wire:click="$emit('alertaGanado','{{$ganado->id}}')">
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
            @else
                <p class="text-lg w-full text-center">No hay ganado registrado</p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('alertaGanado', ganadoId => {
            Swal.fire({
            title: '¿Deseas eliminar el ganado?',
            text: "Una vez eliminada el ganado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarGanado',ganadoId);
                    Swal.fire(
                    'Se elimino el ganado',
                    'Eliminado correctamente',
                    'success'
                    );
                }
            });
        });
    </script>    
@endpush