<div class="mt-4 md:mt-0 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class=" text-gray-900">
        <div class="flex justify-between bg-gray-200 border-b border-gray-300 p-4">
            <h2 class="text-xl font-semibold text-center w-full">Propiedades</h2>
            <a class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('propiedades.create',['productore'=>$productor])}}">Agregar</a>
        </div>
        <div class="p-6">
            @if(count($productor->propiedades)>0)
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <x-table-th>UPP</x-table-th>
                        <x-table-th>Lugar</x-table-th>
                        <x-table-th>Superficie</x-table-th>
                        <x-table-th>Acciones</x-table-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productor->propiedades as $propiedad)
                    <tr>
                        <x-table-td>{{$propiedad->UPP}}</x-table-td>
                        <x-table-td>{{$propiedad->lugar}}</x-table-td>
                        <x-table-td>{{$propiedad->superficie}}</x-table-td>
                        <x-table-td>
                            <div class="flex justify-center">
                                    <a href="{{route('propiedades.edit',['productore'=>$productor,'propiedad'=>$propiedad])}}" class="text-indigo-500 hover:text-indigo-700 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button wire:click="$emit('alertaPropiedad','{{$propiedad->id}}')">
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
                <p class="text-lg w-full text-center">No hay propiedades registradas</p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('alertaPropiedad', propiedadId => {
            Swal.fire({
            title: '¿Deseas eliminar el propiedad?',
            text: "Una vez eliminada el propiedad no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarPropiedad',propiedadId);
                    Swal.fire(
                    'Se elimino el propiedad',
                    'Eliminado correctamente',
                    'success'
                    );
                }
            });
        });
    </script>    
@endpush