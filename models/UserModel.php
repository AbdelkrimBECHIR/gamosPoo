<?php


class UserModel {

    public int $id;
    public string $password;
    public string $email;

    public function getId() : int
    {
        return $this->id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setEmail(string $email) : self
    {
        $this->email = $email;

        return $this;
    }
    public function setPassword(string $password) : self
    {
        $this->password = $password;

        return $this;
    }

}

