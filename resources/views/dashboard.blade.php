<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col justify-between  max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            
            <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-md mb-10">
                <div class="p-6 text-gray-900 flex-row">
                    {{('Hoje é: ')}}{{date('d-m-Y') }}
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md mb-10">
                <div class="flex items-center p-6 text-gray-900 justify-between">
                    {{('Escrever novo registro: ')}}
                    <a href="{{ route('show-create') }}">
                        <img src="/assets/add-icon.png" width="50px">
                    </a>
                </div>    
            </div>


            @if($registros->isEmpty())
                <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-md mb-10">
                    <div class="p-6 text-gray-900 flex-row">
                        {{__('Você ainda não tem nenhum registro no diário.')}}
                    </div>
                </div>
            @endif

            @foreach($registros as $registro)
        
                <div class="flex items-center justify-between bg-white overflow-hidden shadow-sm sm:rounded-md mb-10">
                    <div class="items-center p-6 text-gray-900">
                        {{ ('Data: ') }}{{ $registro->data}}
                    </div>
                    <div class="flex items-center items-center p-6 text-gray-900">
                        {{('Título: ')}} {{$registro->titulo}}
                        <a href="{{ route('show-update', $registro->id) }}">
                            <img class="mx-4" src="/assets/edit.svg  " width="30px">
                        </a>
                        <a href="{{ route('show-update', $registro->id) }}">
                            <img src="/assets/trash.svg" width="30px">
                        </a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</x-app-layout>
