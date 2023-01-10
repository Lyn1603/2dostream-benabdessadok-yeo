<?php

class connect
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=sostream;host=127.0.0.1', 'root', '');
    }

    public function insert(user $user)
    {
        $query = 'INSERT INTO user (firstname, lastname, email, password)
                VALUES (:firstname, :lastname,:email, :password)';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'firstname' =>$user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'password' => md5($user->password . 'MY_SUPER_SALT'),
        ]);
    }

    public function connexion( string $email, string $password) : array | bool
    {
        $query = 'SELECT * FROM user WHERE email = :email AND password = :password  ';
        $log = $this->pdo->prepare($query);
        $log->execute([
            'email' => $email,
            'password' => md5($password . 'MY_SUPER_SALT'),
        ]);
        $result = $log->fetchAll(PDO::FETCH_ASSOC);
        return ($result[0]);

    }






}

