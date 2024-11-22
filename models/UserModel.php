<?php


class UserModel {

    public int $id;
    public string $password;
    public string $email;
    public string $prenom;
    public string $role;

    public function getId() : int
    {
        return $this->id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
    public function getPrenom() : string
    {
        return $this->prenom;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
    public function getRole() : string
    {
        return $this->role;
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
    public function setPrenom(string $prenom) : self
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function setRole(string $role) : self
    {
        $this->role = $role;

        return $this;
    }

}
