<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Lista;
use App\Models\ListaItem;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'criada_em' => ['required', 'date'],
            'atualizada_em' => ['required', 'date'],
            'deletada' => ['required'],
        ]);

        return Lista::create($request->validated());
    }

    public function show($id)
    {
        $lista = (new Lista())->getById($id);
        $itens = (new Item())->allFromJson();
        $listaItens = (new ListaItem())->getItensByListaId($lista['id']);

        // Filtrando itens que já estão na lista
        $itensNome = array_column($listaItens, 'nome');
        $itens = array_filter($itens, fn ($item) => !in_array($item['nome'], $itensNome));

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

    public function destroy(Lista $lista)
    {
        $lista->delete();

        return response()->json();
    }
}
