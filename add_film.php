<?php

class add

{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=spa;host=127.0.0.1', 'root', '');
    }

    public function insert(pets $pets)
    {
        $query = 'INSERT INTO pet(name,type)
                 VALUES(:name,:type)';
        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name' => $pets->name,
            'type' => $pets->type
        ]);
    }
    public function getAll(): array
    {
        $query = 'SELECT * FROM pet';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result =$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete(int $id): bool
    {
        $query = 'DELETE FROM pet
                  WHERE id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id' => $id,
        ]);
    }


}
