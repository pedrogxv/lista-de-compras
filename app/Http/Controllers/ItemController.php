<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use ProtoneMedia\Splade\Facades\Toast;
use stdClass;

class ItemController extends Controller
{
    public function store(ItemRequest $request)
    {
        $model = new Item();
        $produto = new stdClass();
        $produto->nome = $request->get('nome');
        $model->insertData($produto);

        Toast::success('Produto criada com sucesso!');

        return redirect(
            route('home.index')
        );
    }
}
