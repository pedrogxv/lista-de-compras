<?php

namespace App\Concerns;

use Illuminate\Support\Arr;

trait HasJsonQuery
{
    private string $json_file = 'database.json';

    private function read(): array
    {
        $jsonData = file_get_contents("../database/" . $this->json_file);
        return json_decode($jsonData, true);
    }

    public function allFromJson(): array
    {
        $data = $this->read();

        return $data[$this->table] ?? [];
    }

    public function whereLike(string $field, string $like): array
    {
        $raw = $this->read();

        return array_filter($raw[$this->table], fn ($obj) => stripos($obj[$field] ?? '', $like) !== false);
    }

    public function getById(int|string $id): array
    {
        $raw = $this->read();

        $filtered = array_filter($raw[$this->table], fn ($obj) => $obj[$this->id] == $id);

        return $filtered[0] ?? [];
    }
}
