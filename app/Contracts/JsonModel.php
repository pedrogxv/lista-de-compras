<?php

namespace App\Contracts;

use stdClass;
use Illuminate\Database\Eloquent\Model;

abstract class JsonModel extends Model
{
    private string $json_file = 'database.json';

    abstract protected function getId(): string;

    abstract protected function getTableName(): string;

    private function read(): array
    {
        $jsonData = file_get_contents("../database/" . $this->json_file);
        return json_decode($jsonData, true);
    }

    public function allFromJson(): array
    {
        $data = $this->read();

        return $data[$this->getTableName()] ?? [];
    }

    public function whereLike(string $field, string $like): array
    {
        $raw = $this->read();

        return array_filter($raw[$this->getTableName()], fn($obj) => stripos($obj[$field] ?? '', $like) !== false);
    }

    public function getById(int|string $id): array
    {
        $raw = $this->read();

        $filtered = array_filter($raw[$this->getTableName()], fn($obj) => $obj[$this->getId()] == $id);

        return $filtered ?? [];
    }

    public function getFirst(int|string $id): array
    {
        $arr = $this->getById($id);

        return $arr[array_key_first($arr)] ?? [];
    }

    public function insertData(stdClass $object): object
    {
        $raw = $this->read();

        $object->id = $this->getIndex();

        if (isset($raw[$this->getTableName()])) {
            $raw[$this->getTableName()][] = $object;
        } else {
            $raw[$this->getTableName()] = [$object];
        }

        $json = json_encode($raw, JSON_PRETTY_PRINT);

        fwrite(
            fopen("../database/" . $this->json_file, 'r+'),
            $json
        );

        return $object;
    }

    public function updateData(int $id, array $dataToUpdate): bool
    {
        $json_file_path = "../database/" . $this->json_file;

        // Lê o conteúdo original do arquivo JSON
        $json_content = file_get_contents($json_file_path);

        $raw = json_decode($json_content, true);

        if (isset($raw[$this->getTableName()])) {
            foreach ($raw[$this->getTableName()] as $key => &$object) {
                if ($object['id'] === $id) {
                    // Atualiza os campos do objeto com base nos dados fornecidos
                    $object = array_merge($object, $dataToUpdate);
                    break; // Termina o loop após a atualização
                }
            }
        }

        $json = json_encode($raw, JSON_PRETTY_PRINT);

        // Escreve o JSON resultante de volta no arquivo
        file_put_contents($json_file_path, $json);

        return true;
    }


    public function deleteData(int $id): bool
    {
        $json_file_path = "../database/" . $this->json_file;

        // Lê o conteúdo original do arquivo JSON
        $json_content = file_get_contents($json_file_path);

        $raw = json_decode($json_content, true);

        if (isset($raw[$this->getTableName()])) {
            foreach ($raw[$this->getTableName()] as $key => $object) {
                if ($object['id'] == $id) {
                    unset($raw[$this->getTableName()][$key]);
                    // Reindexa as chaves numéricas (opcional)
                    $raw[$this->getTableName()] = array_values($raw[$this->getTableName()]);
                    break; // Termina o loop após a exclusão
                }
            }
        }

        $json = json_encode($raw, JSON_PRETTY_PRINT);

        // Escreve o JSON resultante de volta no arquivo
        file_put_contents($json_file_path, $json);

        return true;
    }


    private function getIndex()
    {
        $raw = $this->read();
        $ids = array_column($raw[$this->getTableName()], $this->getId());

        return isset($ids[0]) ? max($ids) + 1 : 1;
    }
}
