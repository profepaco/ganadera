<div class="mt-4 md:mt-0 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class=" text-gray-900">
        <div class="flex flex-col md:flex-row md:items-center justify-between bg-gray-200 border-b border-gray-300 p-4">
            <h2 class="text-xl font-semibold text-center w-full">Patente</h2>
            @if(!$productor->patente)
                <a class="text-center px-4 py-2 md:py-1 mt-2 md:mt-0 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('patente.create',['productore'=>$productor])}}">Agregar</a>
            @endif
        </div>
        @if($productor->patente)
            <div class="flex flex-col md:flex-row justify-center items-center">
                <div class="m-2 md:m-4 relative flex w-64 flex-col rounded-xl bg-gray-100 bg-clip-border text-gray-700">
                    <div class="relative mx-4 mt-4 h-auto md:h-60 overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                    <img src="{{asset('storage/patentes/'.$productor->patente->fierros[0]->imagen)}}" alt="{{$productor->patente->fierros[0]->imagen}}" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            Fierro principal
                        </h4>
                    </div>
                </div>
                <div class="w-full md:w-3/4 text-center p-6">
                    <div class="mt-2 flex justify-between">
                        <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Libro</p>
                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light lg:text-4xl p-1 text-center">{{$productor->patente->libro}}</p>
                    </div>
                    <div class="mt-2 flex justify-between">
                        <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Foja</p>
                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light md:text-lg lg:text-4xl p-1 text-center">{{$productor->patente->foja}}</p>
                    </div>
                    <div class="mt-2 flex justify-between">
                        <p class="bg-gray-300 py-2 px-2 rounded-l-md w-1/2 text-center font-semibold uppercase text-sm lg:text-lg">Fierros</p>
                        <p class="border w-1/2 border-gray-300 rounded-r-md font-light lg:text-4xl p-1 text-center">{{count($productor->patente->fierros)}}</p>
                    </div>
                    <div class="py-4 flex justify-center lg:items-center gap-3 mt-2 lg:mt-0">
                        <a href="{{route('patente.show',['productore'=>$productor, 'patente'=>$productor->patente])}}" class="text-gray-500 hover:text-gray-700 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <a href="{{route('patente.edit',['productore'=>$productor, 'patente'=>$productor->patente])}}" class="text-indigo-500 hover:text-indigo-700 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 hover:text-red-800 mx-2"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <p class="p-6 text-lg w-full text-center">No hay patente registrada</p>
        @endif
    </div>
</div>