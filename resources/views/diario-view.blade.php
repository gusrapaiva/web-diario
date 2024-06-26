<x-app-layout>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-md p-10 mt-10">
        <form class="max-w-md mx-auto" method="post" action="{{ route('update-diario', $registros->id) }}" enctype="multipart/form-data">
        
        @method('put')
        @csrf  
            <!-- data -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" value="{{ $registros->data }}" name="data" id="data" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " readonly  />
                <label for="data" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Data</label>
            </div>
            <!-- titulo -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" value="{{ $registros->titulo }}" autocomplete="off" name="titulo" id="titulo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="titulo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título</label>
            </div>
            <!-- texto -->
            <div class="relative z-0 w-full mb-5 group">
                <textarea type="text" rows="10" name="texto" id="texto" class="resize-none block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peerbg-blue-50" placeholder=" " required > {{ $registros->texto }} </textarea>
                <label for="texto" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Seu texti</label>
            </div>
            <!-- imagem -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="imagem">Coloque uma foto</label>
                <input type="file" name="imagem" id="imagem" value="{{$registros->imagem}}"  class="block w-full text-sm text-gray-900 border border-blue-200 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help">
                @if ($registros->imagem != "placeholder.png")
                    <div class="flex align-center flex-col" style="width: 250px; height: 250px; overflow: hidden;">
                        <h3>Sua imagem:</h3>
                        <img src="/storage/imagens/{{$registros->imagem}}" width="100%">
                    </div>
                @endif
            </div>
            <div class="flex justify-center">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar</button>
            </div>

            <input type="text" name="id_user" style="display: none;" value="{{Auth::user()->id}}">
        </form>
    </div>

</x-app-layout>
