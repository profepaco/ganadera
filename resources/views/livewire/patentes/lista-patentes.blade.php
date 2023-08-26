<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-semibold md:flex md:justify-center">Patentes registradas</h2>
            @if(count($patentes)>0)
                <div class="inline-block overflow-hidden w-full align-middle border-b border-gray-200 shadow sm:rounded-lg text-sm md:text-base">
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <x-table-th>Libro</x-table-th>
                            <x-table-th>Foja</x-table-th>
                            <x-table-th>Productor</x-table-th>
                            <x-table-th>Fierros</x-table-th>
                            <x-table-th>Acciones</x-table-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patentes as $patente)
                            <tr>
                                <x-table-td>{{$patente->libro}}</x-table-td>
                                <x-table-td>{{$patente->foja}}</x-table-td>
                                <x-table-td>{{$patente->productor->nombre.' '.$patente->productor->apellidos}}</x-table-td>
                                <x-table-td>{{count($patente->fierros)}}</x-table-td>
                                <x-table-td>
                                    <div class="flex flex-col md:flex-row justify-center">
                                        <a href="{{route('patente.show',['patente'=>$patente,'productore'=>$patente->productor])}}" class="text-gray-500 hover:text-gray-700 mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{route('patente.edit',['patente'=>$patente, 'productore'=>$patente->productor])}}" class="text-indigo-500 hover:text-indigo-700 mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
            
                                    </div>
                                </x-table-td>                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            @else
                <p class="my-3 md:flex md:justify-center gap-1">Todavía no tienes<span class="font-semibold"> patentes </span>registrados</p>
            @endif
        </div>
    </div>
    <div class="flex justify-center mt-10">
        {{$patentes->links()}}
    </div>
</div>

