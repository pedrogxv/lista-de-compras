<?php

namespace App\Models;


use App\Contracts\JsonModel;

class Lista extends JsonModel
{
    protected function getId(): string
    {
        return 'id';
    }

    protected function getTableName(): string
    {
        return 'listas';
    }
}
