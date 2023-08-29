<?php

namespace App\Contracts;

use App\Concerns\HasJsonQuery;
use Illuminate\Database\Eloquent\Model;

abstract class JsonModel extends Model
{
    use HasJsonQuery;

    protected string $id = 'id';
}
