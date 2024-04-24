<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-6 text-gray-900">
                {{('Hoje é: ')}}{{date('d-m-Y') }}
                {{('Escrever novo registro: ')}}
                <a href="{{ route('dashboard') }}">
                        <img src="/assets/add-icon.png" width="50px">
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                {{('oi')}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
