<?php

class CarRepository{

    public $dbh;

    public function __construct()
    {
        $this->dbh=$dbh;
    }

            public function getUserByEmailAndId(array $credentials): User|bool
    {
        $sql = 'SELECT * FROM Utilisateurs WHERE email = \'' . $credentials['email'] . '\' AND id_utilisateur = \'' . $credentials['id_utilisateur'] . '\'';
        $stmt = $this->dbh->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(['email','id']);
        }

        public function getCarAvailable() : array
        {
            $sql ='SELECT * FROM Voitures INNER JOIN Disponibilites ON status = disponible ';
            $stmt=$this->prepare($sql);

            $stmt->execute();

            return fetch();
        }
}
?>