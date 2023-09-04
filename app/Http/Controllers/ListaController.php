<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Lista;
use App\Models\ListaItem;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use stdClass;

class ListaController extends Controller
{
    public function create()
    {
        return view('lista.create');
    }

    public function store(Request $request)
    {
        $model = new Lista();
        $lista = new stdClass();
        $lista->nome = $request->get('nome');
        $lista = $model->insertData($lista);

        Toast::success('Lista criada com sucesso!');

        return redirect(
            route('lista.show', $lista->id)
        );
    }

    public function show($id)
    {
        $lista = (new Lista())->getFirst($id);

        $itens = (new Item())->allFromJson();
        $listaItens = (new ListaItem())
            ->whereLike('lista_id', $id);

        // Filtrando itens que já estão na lista
        $itensNome = array_column($listaItens, 'item_id');
        $itens = array_filter($itens, fn ($item) => !in_array($item['id'], $itensNome));

        return view('lista.show', compact(
            'lista', 'itens', 'listaItens'
        ));
    }

    public function update(Request $request, Lista $lista)
    {
        $request->validate([
            'nome' => ['required'],
            'criada_em' => ['required', 'date'],
            'atualizada_em' => ['required', 'date'],
            'deletada' => ['required'],
        ]);

        $lista->update($request->validated());

        return $lista;
    }

    public function destroy($id)
    {
        $model = new Lista();
        $li_model = new ListaItem();

        $lis = $li_model->whereLike('lista_id', $id);

        foreach ($lis as $li) {
            $li_model->deleteData($li['id']);
        }

        $model->deleteData($id);

        Toast::success("Lista removida com sucesso!");

        return redirect(
            route('home.index')
        );
    }
}
