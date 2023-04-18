<x-layout>
    <div class="w-100 mt-5">
        <div class="m-auto flex" style="width: fit-content">
            <x-text-input name="nome" placeholder="Digite o nome de um item..."
                          class="p-3 border-blue-400 border-2"
                          style="width: 400px !important;">

            </x-text-input>

            <div class="ms-4 m-auto">
                <x-primary-button id="novo-item-submit">
                    Adicionar Item
                </x-primary-button>
            </div>
        </div>
    </div>

    <x-panel class="flex flex-col items-center pt-16 pb-16" id="itens">
        <div class="m-auto" id="sem-items">
            <span>Nenhum item adicionado!</span>
        </div>
    </x-panel>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#novo-item-submit").addEventListener("click", () => {
                const semItem = document.querySelector("#sem-items");
                if (semItem) {
                    semItem.style.display = "none";
                }

                addItem(document.querySelector("[name='nome']").value);
            });

            function addItem(nome) {
                const itemList = document.querySelector("#itens");
                const span = document.createElement('span');
                span.innerHTML = nome;
                span.classList.add("m-3", "border-1", "border-blue-400");

                itemList.appendChild(span);
            }
        });

    </script>
</x-layout>
