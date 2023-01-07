<?php

class add

{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname= 2dostream;host=127.0.0.1', 'root', '');
    }

    public function insert(albums $albums)
    {
        $query = 'INSERT INTO album(name,type)
                 VALUES(:name,:type)';
        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name' => $albums->name,
            'type' => $albums->type
        ]);
    }
    public function getAll(): array
    {
        $query = 'SELECT * FROM album';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result =$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete(int $id): bool
    {
        $query = 'DELETE FROM album
                  WHERE id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id' => $id,
        ]);
    }


}
