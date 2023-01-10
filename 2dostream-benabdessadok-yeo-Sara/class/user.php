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








}
