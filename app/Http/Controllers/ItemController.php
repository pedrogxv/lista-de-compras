<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required'],
            'valor' => ['required', 'numeric'],
            'criada_em' => ['required', 'date'],
            'atualizada_em' => ['required', 'date'],
            'deletada' => ['required'],
        ]);

        return Item::create($request->validated());
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nome' => ['required'],
            'valor' => ['required', 'numeric'],
            'criada_em' => ['required', 'date'],
            'atualizada_em' => ['required', 'date'],
            'deletada' => ['required'],
        ]);

        $item->update($request->validated());

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json();
    }
}
