<?php

require "Model/Voiture.php";

class CarsRepository
{

    public $dbh; // garde en méméoire les datas

    public function __construct($dbh) // constructeur en parametres les datas
    {

        $this->dbh = $dbh; // j'envoie cette variable dans cette instance
    }

    public function getCars(): array // affiche la liste des voitures
    {
        $sql = 'SELECT * FROM Voitures';
        $stmt->BindParam('id_voiture', $id_voiture);
        $stmt->BindParam('marque', $marque);
        $stmt->BindParam('image_path', $image_path);
        $stmt = $this->dbh->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Voiture::class);
    }
    
    }
