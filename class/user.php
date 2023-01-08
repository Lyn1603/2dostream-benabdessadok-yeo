<?php

require_once 'connect.php';
class user
{
    public string $firstname;
        public string $lastname;
        public string $email;
        public int $age;
        private string $password;
        private string $password1;
    public function __construct($array)
    {
        $this->firstname = $array['firstname'];
        $this->lastname = $array['lastname'];
        $this->age = $array['age'];
        $this->email = $array['email'];
        $this->Password($array['password']);
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
    public function Password($string): void
    {
        $this->password = hash('sha256',$string . "p€@NÜt-_-BüTt€R");
    }


}
