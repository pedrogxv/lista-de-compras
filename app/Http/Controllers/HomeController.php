<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListaResource;
use App\Models\Lista;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $itens = (new Lista())->allFromJson();

        return view('home', [
            "listas" => ListaResource::collection($itens),
        ]);
    }

    public function store(Request $request)
    {
        $itens = (new Lista())->whereLike("nome", $request->get('search'));

        return view('home', [
            "listas" => ListaResource::collection($itens),
        ]);
    }
}
