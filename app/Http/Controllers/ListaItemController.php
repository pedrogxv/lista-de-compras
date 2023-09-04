<?php

namespace App\Http\Controllers;

use App\Models\ListaItem;
use Illuminate\Http\Request;

class ListaItemController extends Controller
{
    public function index()
    {
        return ListaItem::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return ListaItem::create($request->validated());
    }

    public function show(ListaItem $listaItem)
    {
        return $listaItem;
    }

    public function update(Request $request, ListaItem $listaItem)
    {
        $request->validate([

        ]);

        $listaItem->update($request->validated());

        return $listaItem;
    }

    public function destroy(ListaItem $listaItem)
    {
        $listaItem->delete();

        return response()->json();
    }
}
