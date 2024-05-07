<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="p-6 text-gray-900">
                    {{ __("Usuários:") }}
                </div>
            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-black">
                    <thead class="text-xs uppercase bg-gray-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Registros
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                    @if($usuario['usertype'] != 'admin')
                        <tr class="bg-white hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{$usuario['nome']}}
                            </th>
                            <td class="px-6 py-4">
                                {{$usuario['email']}}
                            </td>
                            <td class="px-6 py-4">
                                {{$usuario['quantidade']}}
                            </td>
                        </tr> 
                        @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
    </div>
</x-app-layout>