<x-layout>
    <div class="">
        <div class="flex">
            <Link
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                href="{{ route('home.index') }}">
            voltar
            </Link>

            <h2 class="text-white text-3xl">Lista - {{ $lista['nome'] }}</h2>

            <div class="ms-auto">
                <x-buttons.save text="Salvar Lista"/>
            </div>
        </div>

        <div
            class="mt-5 w-full p-4 flex flex-col border border-gray-200 bg-gray-50 rounded-xl dark:border-gray-600 dark:bg-gray-700">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Selecione um alimento
            </label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Selecione um alimento</option>
                @foreach($itens as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nome'] }}</option>
                @endforeach
            </select>
            <div class="flex gap-2">
                <div>
                    <label for="visitors" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">
                        Quantidade do produto
                    </label>
                    <input type="number" id="visitors"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="" required>
                </div>
                <div class="w-full">
                    <label for="countries" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">
                        Unidade de Medida
                    </label>
                    <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selecione uma Unidade de Medida</option>
                        <option value="u" selected>Unitário</option>
                        <option value="mg">Miligramas</option>
                        <option value="kg">Quilogramas</option>
                        <option value="g">Gramas</option>
                        <option value="l">Litros</option>
                        <option value="ml">Mililitros</option>
                    </select>
                </div>
            </div>
            <button
                class="ms-auto mt-3 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <svg class="mx-3 w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                </svg>
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  Adicionar à Lista
                </span>
            </button>
        </div>
    </div>

    <div>
        @isset($listaItens)
            @foreach($listaItens as $li)
                <div id="produto-1"
                     class="produto my-4 w-full flex items-center dark:text-white p-4 border border-gray-200 bg-gray-50 rounded-xl dark:border-gray-600 dark:bg-gray-700">
                    <span class="mr-2 produto-qtd">{{ $li['quantidade']}}</span>
                    <span class="produto-nome">{{ $li['nome']}}</span>
                    <div class="ms-auto flex items-center">
                        <button type="button"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 1v16M1 9h16"/>
                            </svg>
                            <span class="sr-only">Adicionar</span>
                        </button>
                        <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 1h16"/>
                            </svg>
                            <span class="sr-only">Subtrair</span>
                        </button>
                        <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                            </svg>
                            <span class="sr-only">Remover</span>
                        </button>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>

    @push('script')
        <script>

        </script>
    @endpush
</x-layout>
