<?php

namespace App\Models;


use App\Contracts\JsonModel;

class ListaItem extends JsonModel
{
    protected function getId(): string
    {
        return 'id';
    }

    protected function getTableName(): string
    {
        return 'lista_item';
    }
}
