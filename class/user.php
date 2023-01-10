<?php


class user
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
        public string $password,
        public string $password1,
    )
    {

    }
    public function verify(): bool
    {
        $isValid = true;

        if ($this->email === '') {
            $isValid = false;
        }

        if ($this->password === '' || $this->password !== $this->password1) {
            $isValid = false;
        }
        return $isValid;


    }

    public function Liked($album_id)
    {
        $db = new Connect();
        $request = $db->PDO->prepare('SELECT * FROM like_by WHERE album_id = :a AND user_id = :u');
        $request->execute(['a' => $album_id, 'u' => $this->getID()]);
        return sizeof($request->fetchAll()) > 0;
    }








}
