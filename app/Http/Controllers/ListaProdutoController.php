<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\ListaItem;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use stdClass;

class ListaProdutoController extends Controller
{
    public function store(Request $request, int $lista_id)
    {
        try {
            $lista = new stdClass();

            $lista->lista_id = $lista_id;
            $lista->item_id = $request->get('produto');
            $lista->quantidade = $request->get('quantidade');
            $lista->unidade = $request->get('unidade');

            (new ListaItem())->saveData($lista);

            Toast::success("Produto adicionado com sucesso!");
        } catch (\Throwable $th) {
            Toast::danger("Houve um erro ao adicionar o produto.");
        }

        return redirect(route('lista.show', $lista_id));
    }

    public function destroy(int $id)
    {
        $model = new ListaItem();

        $item = $model->getById($id);
        $model->deleteData($id);

        Toast::success("Produto removido com sucesso!");

        return redirect(
            route('lista.show', $item[0]['lista_id'])
        );
    }
}
