<x-layout>
    <div class="m-5">
        <div class="m-auto flex">
            <form class="w-full" method="POST" action="{{ route('home.store') }}">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search"
                           value="{{ request()->get('search') ?? '' }}"
                           class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Procure por listas ou alimentos..." required>
                    <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-5 ms-7">
        <span class="text-gray-400">
            {{ $listas->count() }} listas encontadas
            @if(request()->get('search'))
                para filtro '{{ request()->get('search') }}'
            @endif
        </span>
        @if(request()->get('search'))
            <Link href="{{ route('home.index') }}" type="button"
                    class="ms-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Remover Filtro
            </Link>
        @endif
    </div>

    <div class="m-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        <x-card title="Crie uma lista!" redirect-url="/create" btn-text="Criar" class="border-green-600 dark:border-green-600" />
        @foreach($listas as $lista)
            <x-card :title="$lista['nome']" :redirect-url="route('lista.show', $lista['id'])" btn-text="Acessar"/>
        @endforeach
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let itemCounter = 0;

            document.querySelector("#novo-item-submit").addEventListener("click", () => {
                const itemNome = document.querySelector("[name='nome']").value;
                if (!itemNome) return;

                const semItem = document.querySelector("#sem-items");
                if (semItem) {
                    semItem.style.display = "none";
                }

                addItem(itemNome, itemCounter);
                ++itemCounter;
            });
        });

        function addItem(nome, itemCounter) {
            const itensWrapper = document.querySelector("#itens-wrapper");

            const divWrapper = document.createElement("div");
            divWrapper.classList.add("wrapper", "m-3");
            divWrapper.id = `item-wrapper-${itemCounter}`;

            const span = document.createElement('span');
            span.innerHTML = nome;
            span.classList.add("m-3", "border-1", "border-blue-400");

            const btnDelete = document.createElement("button");
            btnDelete.innerHTML = "Remover";
            btnDelete.classList.add("bg-red-500", "hover:bg-white-700", "text-white", "font-bold", "py-1", "px-2", "rounded-full");
            btnDelete.addEventListener('click', (e) => deleteItem(itemCounter));

            divWrapper.appendChild(span);
            divWrapper.appendChild(btnDelete);

            itensWrapper.appendChild(divWrapper);
        }

        function deleteItem(itemId) {
            const itemWrapper = document.querySelector(`#item-wrapper-${itemId}`);
            itemWrapper.remove();
        }

    </script>
</x-layout>
