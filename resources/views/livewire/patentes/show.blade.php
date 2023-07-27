<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalle de la patente') }}
            </h2>
            <a href="{{ route('productores.show',['productore'=>$productor]) }}" class="px-4 py-1 bg-slate-50 border border-gray-300 rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-xs">
                    {{session('message')}}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 ">
                    <h2 class="text-xl font-semibold md:flex md:justify-center bg-gray-200 border-b border-gray-300 p-4">Datos de la patente</h2>
                    <div class="md:flex md:justify-center md:items-center">
                        <div class="md:w-2/3 text-center p-6">
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Productor</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light lg:text-2xl p-1 md:p-4 text-center">{{$productor->nombre.' '.$productor->apellidos}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Libro</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light lg:text-4xl p-1 text-center">{{$patente->libro}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Foja</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg lg:text-4xl p-1 text-center">{{$patente->foja}}</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Fierros registrados</p>
                                <p class="border w-1/2 border-gray-300 rounded-r-md font-light lg:text-4xl p-1 text-center">{{count($patente->fierros)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class=" text-gray-900 ">
                    <div class="flex flex-col md:flex-row md:items-center justify-between bg-gray-200 border-b border-gray-300 p-4">
                        <h2 class="text-xl font-semibold text-center w-full">Fierros registrados</h2>
                        <a class="text-center px-4 py-2 md:py-1 bg-gray-800 border border-transparent rounded-md font-semibold mt-2 md:mt-0 text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('fierro.create',['productore'=>$productor,'patente'=>$patente])}}">Agregar</a>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 items-center">
                        @for($i=0;$i<count($patente->fierros);$i++)
                            <div class="m-4 relative flex w-64 flex-col rounded-xl bg-gray-100 bg-clip-border text-gray-700">
                                <div class="relative mx-4 mt-4 h-72 overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                <img src="{{asset('storage/patentes/'.$patente->fierros[$i]->imagen)}}" alt="{{$patente->fierros[$i]->imagen}}" />
                                </div>
                                <div class="p-6 text-center">
                                    <h4 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                        {{$i == 0 ? 'Principal':'Secundario'}}
                                    </h4>
                                    <button {{$i==0 ? 'disabled':''}} wire:click="$emit('alertaFierro','{{$patente->fierros[$i]->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ $i!=0 ? 'text-red-500 hover:text-red-800':'text-gray-500' }} mx-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('alertaFierro', fierroId => {
            Swal.fire({
            title: '¿Deseas eliminar el Fierro ?',
            text: "Una vez eliminada el Fierro no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarFierro',fierroId);
                    Swal.fire(
                    'Se elimino el Fierro',
                    'Eliminado correctamente',
                    'success'
                    );
                }
            });
        });
    </script>    
@endpush